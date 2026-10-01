<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Mostrar todos los usuarios.
     */
    public function index()
    {
        $usuarios = User::with('roles')
            ->orderBy('id', 'desc')
            ->get();

        return view('usuarios.index', compact('usuarios'));
    }


    /**
     * Mostrar formulario para crear usuario.
     */
    public function create()
    {
        $roles = Role::where('estado', true)
            ->orderBy('nombre')
            ->get();

        return view('usuarios.create', compact('roles'));
    }


    /**
     * Guardar nuevo usuario.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],

            'estado' => 'boolean',

            'role_id' => [
                'required',
                'exists:roles,id',
            ],
        ]);


        $usuario = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'estado' => $request->boolean('estado'),
        ]);


        // Asignar el rol seleccionado
        $usuario->roles()->sync([
            $validated['role_id']
        ]);


        return redirect()
            ->route('usuarios.index')
            ->with('success', 'Usuario creado correctamente.');
    }


    /**
     * Mostrar información de un usuario.
     */
    public function show($id)
    {
        $usuario = User::with('roles')
            ->findOrFail($id);

        return view('usuarios.show', compact('usuario'));
    }


    /**
     * Mostrar formulario para editar usuario.
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);

        $roles = Role::where('estado', true)
            ->orderBy('nombre')
            ->get();

        return view('usuarios.edit', compact(
            'usuario',
            'roles'
        ));
    }


    /**
     * Actualizar usuario.
     */
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);


        $validated = $request->validate([
            'name' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')
                    ->ignore($usuario->id),
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],

            'estado' => 'boolean',

            'role_id' => [
                'required',
                'exists:roles,id',
            ],
        ]);


        $datos = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'estado' => $request->boolean('estado'),
        ];


        // Solo cambiar contraseña si se escribió una nueva
        if (!empty($validated['password'])) {

            $datos['password'] = Hash::make(
                $validated['password']
            );
        }


        $usuario->update($datos);


        // Actualizar el rol
        $usuario->roles()->sync([
            $validated['role_id']
        ]);


        return redirect()
            ->route('usuarios.index')
            ->with('success', 'Usuario actualizado correctamente.');
    }


    /**
     * Eliminar usuario.
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);


        // Evitar eliminar al administrador principal
        if ($usuario->email === 'admin@prisma.com') {

            return redirect()
                ->route('usuarios.index')
                ->with(
                    'error',
                    'El administrador principal no se puede eliminar.'
                );
        }


        // No permitir eliminar usuarios que tengan ventas registradas
        if ($usuario->ventas()->exists()) {

            return redirect()
                ->route('usuarios.index')
                ->with(
                    'error',
                    'No se puede eliminar este usuario porque tiene ventas registradas.'
                );
        }


        // No permitir eliminar usuarios que tengan compras registradas
        if ($usuario->compras()->exists()) {

            return redirect()
                ->route('usuarios.index')
                ->with(
                    'error',
                    'No se puede eliminar este usuario porque tiene compras registradas.'
                );
        }


        // No permitir eliminar usuarios con movimientos de inventario
        if ($usuario->movimientosInventario()->exists()) {

            return redirect()
                ->route('usuarios.index')
                ->with(
                    'error',
                    'No se puede eliminar este usuario porque tiene movimientos de inventario registrados.'
                );
        }


        // Desvincular roles
        $usuario->roles()->detach();


        // Eliminar usuario
        $usuario->delete();


        return redirect()
            ->route('usuarios.index')
            ->with(
                'success',
                'Usuario eliminado correctamente.'
            );
    }
}