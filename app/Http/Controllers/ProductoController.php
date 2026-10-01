<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with([
            'categoria',
            'proveedor'
        ])
            ->orderBy('id', 'desc')
            ->get();

        return view(
            'productos.index',
            compact('productos')
        );
    }


    public function create()
    {
        $categorias = Categoria::where('estado', true)
            ->orderBy('nombre')
            ->get();

        $proveedores = Proveedor::where('estado', true)
            ->orderBy('nombre')
            ->get();

        return view(
            'productos.create',
            compact(
                'categorias',
                'proveedores'
            )
        );
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => [
                'required',
                'string',
                'max:30',
                'unique:productos,codigo',
            ],

            'nombre' => [
                'required',
                'string',
                'max:150',
            ],

            'descripcion' => [
                'nullable',
                'string',
            ],

            'categoria_id' => [
                'required',
                'exists:categorias,id',
            ],

            'proveedor_id' => [
                'required',
                'exists:proveedores,id',
            ],

            'precio_compra' => [
                'required',
                'numeric',
                'min:0',
            ],

            'precio_venta' => [
                'required',
                'numeric',
                'min:0',
            ],

            'impuesto_porcentaje' => [
                'required',
                'numeric',
                'min:0',
                'max:100',
            ],

            'stock' => [
                'required',
                'integer',
                'min:0',
            ],

            'stock_minimo' => [
                'required',
                'integer',
                'min:0',
            ],

            'fecha_vencimiento' => [
                'nullable',
                'date',
            ],

            'estado' => [
                'boolean',
            ],
        ]);


        Producto::create($validated);


        return redirect()
            ->route('productos.index')
            ->with(
                'success',
                'Producto creado correctamente.'
            );
    }


    public function show($id)
    {
        $producto = Producto::with([
            'categoria',
            'proveedor'
        ])
            ->findOrFail($id);

        return view(
            'productos.show',
            compact('producto')
        );
    }


    public function edit($id)
    {
        // Obtener el producto que se quiere editar
        $producto = Producto::findOrFail($id);


        // Obtener categorías activas
        $categorias = Categoria::where('estado', true)
            ->orderBy('nombre')
            ->get();


        // Obtener proveedores activos
        $proveedores = Proveedor::where('estado', true)
            ->orderBy('nombre')
            ->get();


        return view(
            'productos.edit',
            compact(
                'producto',
                'categorias',
                'proveedores'
            )
        );
    }


    public function update(Request $request, $id)
    {
        // Buscar el producto
        $producto = Producto::findOrFail($id);


        // Validar información
        $validated = $request->validate([
            'codigo' => [
                'required',
                'string',
                'max:30',
                'unique:productos,codigo,' . $producto->id,
            ],

            'nombre' => [
                'required',
                'string',
                'max:150',
            ],

            'descripcion' => [
                'nullable',
                'string',
            ],

            'categoria_id' => [
                'required',
                'exists:categorias,id',
            ],

            'proveedor_id' => [
                'required',
                'exists:proveedores,id',
            ],

            'precio_compra' => [
                'required',
                'numeric',
                'min:0',
            ],

            'precio_venta' => [
                'required',
                'numeric',
                'min:0',
            ],

            'impuesto_porcentaje' => [
                'required',
                'numeric',
                'min:0',
                'max:100',
            ],

            'stock_minimo' => [
                'required',
                'integer',
                'min:0',
            ],

            'fecha_vencimiento' => [
                'nullable',
                'date',
            ],

            'estado' => [
                'boolean',
            ],
        ]);


        // Actualizar solamente los datos permitidos
        $producto->update([
            'codigo' => $validated['codigo'],
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'] ?? null,
            'categoria_id' => $validated['categoria_id'],
            'proveedor_id' => $validated['proveedor_id'],
            'precio_compra' => $validated['precio_compra'],
            'precio_venta' => $validated['precio_venta'],
            'impuesto_porcentaje' => $validated['impuesto_porcentaje'],
            'stock_minimo' => $validated['stock_minimo'],
            'fecha_vencimiento' => $validated['fecha_vencimiento'] ?? null,
            'estado' => $request->boolean('estado'),
        ]);


        return redirect()
            ->route('productos.index')
            ->with(
                'success',
                'Producto actualizado correctamente.'
            );
    }


    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);


        $producto->delete();


        return redirect()
            ->route('productos.index')
            ->with(
                'success',
                'Producto eliminado correctamente.'
            );
    }
}