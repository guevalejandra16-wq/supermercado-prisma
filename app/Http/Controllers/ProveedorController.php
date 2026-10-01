<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;


class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::orderBy('id', 'desc')->get();

        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:150',
            'rtn' => 'nullable|string|max:20|unique:proveedores,rtn',
            'telefono' => 'nullable|string|max:20',
            'correo' => 'nullable|email|max:100',
            'contacto' => 'nullable|string|max:100',
            'direccion' => 'nullable|string|max:255',
            'estado' => 'boolean',
        ]);

        Proveedor::create($validated);

        return redirect()
            ->route('proveedores.index')
            ->with('success', 'Proveedor creado correctamente.');
    }

    public function show($id)
{
    $proveedor = Proveedor::findOrFail($id);

    $proveedor->load('productos');

    return view('proveedores.show', compact('proveedor'));
}
    public function edit($id)
{
    $proveedor = Proveedor::findOrFail($id);

    return view('proveedores.edit', compact('proveedor'));
}

    public function update(Request $request, $id)
{
    $proveedor = Proveedor::findOrFail($id);

    $proveedor->nombre = $request->nombre;
    $proveedor->rtn = $request->rtn;
    $proveedor->telefono = $request->telefono;
    $proveedor->correo = $request->correo;
    $proveedor->contacto = $request->contacto;
    $proveedor->direccion = $request->direccion;
    $proveedor->estado = $request->has('estado');

    $proveedor->save();

    return redirect('/proveedores')
        ->with('success', 'Proveedor actualizado correctamente.');
}

        public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);

        if ($proveedor->productos()->exists()) {
            return redirect('/proveedores')
                ->with('error', 'No se puede eliminar un proveedor que tiene productos asociados.');
        }

        if ($proveedor->compras()->exists()) {
            return redirect('/proveedores')
                ->with('error', 'No se puede eliminar un proveedor que tiene compras registradas.');
        }

        $proveedor->delete();

        return redirect('/proveedores')
            ->with('success', 'Proveedor eliminado correctamente.');
    }
}
