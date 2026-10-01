<?php

namespace App\Http\Controllers;

use App\Models\MovimientoInventario;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovimientoInventarioController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['categoria', 'proveedor'])
            ->orderBy('nombre')
            ->get();

        $movimientos = MovimientoInventario::with(['producto', 'usuario'])
            ->orderBy('id', 'desc')
            ->get();

        $productosStockBajo = Producto::where('estado', true)
            ->whereColumn('stock', '<=', 'stock_minimo')
            ->orderBy('stock')
            ->get();

        return view('inventario.index', compact(
            'productos',
            'movimientos',
            'productosStockBajo'
        ));
    }

    public function create()
    {
        $productos = Producto::where('estado', true)
            ->orderBy('nombre')
            ->get();

        return view('inventario.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'tipo' => 'required|in:ENTRADA,SALIDA',
            'cantidad' => 'required|integer|min:1',
            'motivo' => 'nullable|string|max:255',
            'referencia' => 'nullable|string|max:100',
            'fecha' => 'required|date',
        ]);

        DB::transaction(function () use ($validated) {

            $producto = Producto::findOrFail($validated['producto_id']);

            if (
                $validated['tipo'] === 'SALIDA' &&
                $producto->stock < $validated['cantidad']
            ) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'cantidad' => 'No hay suficiente stock disponible para realizar esta salida.'
                ]);
            }

            if ($validated['tipo'] === 'ENTRADA') {
                $producto->increment('stock', $validated['cantidad']);
            }

            if ($validated['tipo'] === 'SALIDA') {
                $producto->decrement('stock', $validated['cantidad']);
            }

            MovimientoInventario::create([
                'producto_id' => $producto->id,
                'user_id' => auth()->id(),
                'tipo' => $validated['tipo'],
                'cantidad' => $validated['cantidad'],
                'motivo' => $validated['motivo'],
                'referencia' => $validated['referencia'],
                'fecha' => $validated['fecha'],
            ]);
        });

        return redirect()
            ->route('inventario.index')
            ->with('success', 'Movimiento de inventario registrado correctamente.');
    }

    public function show($id)
    {
        $movimiento = MovimientoInventario::with([
            'producto',
            'usuario'
        ])->findOrFail($id);

        return view('inventario.show', compact('movimiento'));
    }

    public function edit($id)
    {
        $movimiento = MovimientoInventario::with('producto')
            ->findOrFail($id);

        return view('inventario.edit', compact('movimiento'));
    }

    public function update(Request $request, $id)
    {
        return redirect()
            ->route('inventario.index')
            ->with(
                'error',
                'Los movimientos de inventario registrados no se pueden modificar porque forman parte del historial del stock.'
            );
    }

    public function destroy($id)
    {
        return redirect()
            ->route('inventario.index')
            ->with(
                'error',
                'Los movimientos de inventario no se pueden eliminar porque forman parte del historial del stock.'
            );
    }
}