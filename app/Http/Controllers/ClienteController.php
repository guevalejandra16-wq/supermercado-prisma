<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('id', 'desc')->get();

        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'dni' => 'nullable|string|max:20|unique:clientes,dni',
            'telefono' => 'nullable|string|max:20',
            'correo' => 'nullable|email|max:100',
            'direccion' => 'nullable|string|max:255',
            'estado' => 'boolean',
        ]);

        Cliente::create($validated);

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente creado correctamente.');
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->load('ventas');

        return view('clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'dni' => [
                'nullable',
                'string',
                'max:20',
                function ($attribute, $value, $fail) use ($cliente) {
                    if (
                        $value !== null &&
                        $value !== $cliente->dni &&
                        Cliente::where('dni', $value)
                            ->where('id', '!=', $cliente->id)
                            ->exists()
                    ) {
                        $fail('El DNI ya está registrado en otro cliente.');
                    }
                },
            ],
            'telefono' => 'nullable|string|max:20',
            'correo' => 'nullable|email|max:100',
            'direccion' => 'nullable|string|max:255',
            'estado' => 'boolean',
        ]);

        $cliente->update($validated);

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);

        if ($cliente->ventas()->exists()) {
            return redirect()
                ->route('clientes.index')
                ->with('error', 'No se puede eliminar un cliente que tiene ventas registradas.');
        }

        $cliente->delete();

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente eliminado correctamente.');
    }
}