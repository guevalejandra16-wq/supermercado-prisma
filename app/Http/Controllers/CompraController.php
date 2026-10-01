<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\DetalleCompra;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\MovimientoInventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::with(['proveedor', 'usuario'])
            ->orderBy('id', 'desc')
            ->get();

        return view('compras.index', compact('compras'));
    }

    public function create()
    {
        $proveedores = Proveedor::where('estado', true)
            ->orderBy('nombre')
            ->get();

        $productos = Producto::where('estado', true)
            ->orderBy('nombre')
            ->get();

        return view('compras.create', compact('proveedores', 'productos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'proveedor_id' => 'required|exists:proveedores,id',
            'fecha' => 'required|date',
            'impuesto' => 'nullable|numeric|min:0',
            'detalles' => 'required|array|min:1',
            'detalles.*.producto_id' => 'required|exists:productos,id',
            'detalles.*.cantidad' => 'required|integer|min:1',
            'detalles.*.precio' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($validated) {

            $subtotal = 0;

            foreach ($validated['detalles'] as $detalle) {
                $subtotal += $detalle['cantidad'] * $detalle['precio'];
            }

            $impuesto = $validated['impuesto'] ?? 0;
            $total = $subtotal + $impuesto;

            $ultimoNumero = Compra::orderBy('id', 'desc')->value('id') ?? 0;
            $numeroCompra = 'COM-' . str_pad($ultimoNumero + 1, 6, '0', STR_PAD_LEFT);

            $compra = Compra::create([
                'proveedor_id' => $validated['proveedor_id'],
                'user_id' => auth()->id(),
                'fecha' => $validated['fecha'],
                'numero_compra' => $numeroCompra,
                'subtotal' => $subtotal,
                'impuesto' => $impuesto,
                'total' => $total,
                'estado' => 'COMPLETADA',
            ]);

            foreach ($validated['detalles'] as $detalle) {

                $subtotalDetalle = $detalle['cantidad'] * $detalle['precio'];

                DetalleCompra::create([
                    'compra_id' => $compra->id,
                    'producto_id' => $detalle['producto_id'],
                    'cantidad' => $detalle['cantidad'],
                    'precio' => $detalle['precio'],
                    'subtotal' => $subtotalDetalle,
                ]);

                $producto = Producto::findOrFail($detalle['producto_id']);

                $producto->increment('stock', $detalle['cantidad']);

                MovimientoInventario::create([
                    'producto_id' => $producto->id,
                    'user_id' => auth()->id(),
                    'tipo' => 'ENTRADA',
                    'cantidad' => $detalle['cantidad'],
                    'motivo' => 'Compra de productos',
                    'referencia' => $numeroCompra,
                    'fecha' => $validated['fecha'],
                ]);
            }
        });

        return redirect()
            ->route('compras.index')
            ->with('success', 'Compra registrada correctamente.');
    }

    public function show($id)
    {
        $compra = Compra::with([
            'proveedor',
            'usuario',
            'detalles.producto'
        ])->findOrFail($id);

        return view('compras.show', compact('compra'));
    }

    public function edit($id)
    {
        $compra = Compra::with('detalles')->findOrFail($id);

        $proveedores = Proveedor::where('estado', true)
            ->orderBy('nombre')
            ->get();

        $productos = Producto::where('estado', true)
            ->orderBy('nombre')
            ->get();

        return view('compras.edit', compact(
            'compra',
            'proveedores',
            'productos'
        ));
    }

    public function update(Request $request, $id)
    {
        $compra = Compra::findOrFail($id);

        $validated = $request->validate([
            'proveedor_id' => 'required|exists:proveedores,id',
            'fecha' => 'required|date',
            'estado' => 'required|string|max:30',
        ]);

        $compra->update([
            'proveedor_id' => $validated['proveedor_id'],
            'fecha' => $validated['fecha'],
            'estado' => $validated['estado'],
        ]);

        return redirect()
            ->route('compras.index')
            ->with('success', 'Compra actualizada correctamente.');
    }

    public function destroy($id)
    {
        $compra = Compra::findOrFail($id);

        return redirect()
            ->route('compras.index')
            ->with(
                'error',
                'Las compras registradas no se pueden eliminar porque forman parte del historial del inventario.'
            );
    }
}