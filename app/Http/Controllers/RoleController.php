<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Privilege;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with([
            'privileges',
            'users'
        ])
            ->orderBy('id', 'desc')
            ->get();

        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $privilegios = Privilege::where('estado', true)
            ->orderBy('modulo')
            ->orderBy('nombre')
            ->get();

        return view('roles.create', compact('privilegios'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:50|unique:roles,nombre',
            'descripcion' => 'nullable|string|max:255',
            'estado' => 'boolean',
            'privilegios' => 'nullable|array',
            'privilegios.*' => 'exists:privileges,id',
        ]);

        $rol = Role::create([
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'] ?? null,
            'estado' => $request->boolean('estado'),
        ]);

        $rol->privileges()->sync(
            $validated['privilegios'] ?? []
        );

        return redirect()
            ->route('roles.index')
            ->with('success', 'Rol creado correctamente.');
    }

    public function show($id)
    {
        $rol = Role::with([
            'privileges',
            'users'
        ])->findOrFail($id);

        return view('roles.show', compact('rol'));
    }

    public function edit($id)
    {
        $rol = Role::with('privileges')
            ->findOrFail($id);

        $privilegios = Privilege::where('estado', true)
            ->orderBy('modulo')
            ->orderBy('nombre')
            ->get();

        return view('roles.edit', compact(
            'rol',
            'privilegios'
        ));
    }

    public function update(Request $request, $id)
    {
        $rol = Role::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:50|unique:roles,nombre,' . $rol->id,
            'descripcion' => 'nullable|string|max:255',
            'estado' => 'boolean',
            'privilegios' => 'nullable|array',
            'privilegios.*' => 'exists:privileges,id',
        ]);

        $rol->update([
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'] ?? null,
            'estado' => $request->boolean('estado'),
        ]);

        $rol->privileges()->sync(
            $validated['privilegios'] ?? []
        );

        return redirect()
            ->route('roles.index')
            ->with('success', 'Rol actualizado correctamente.');
    }

    public function destroy($id)
    {
        $rol = Role::findOrFail($id);

        if ($rol->users()->exists()) {
            return redirect()
                ->route('roles.index')
                ->with(
                    'error',
                    'No se puede eliminar este rol porque tiene usuarios asignados.'
                );
        }

        $rol->privileges()->detach();

        $rol->delete();

        return redirect()
            ->route('roles.index')
            ->with(
                'success',
                'Rol eliminado correctamente.'
            );
    }

    public function compras(Request $request)
{
    $fechaInicio = $request->input('fecha_inicio');
    $fechaFin = $request->input('fecha_fin');

    $query = Compra::with([
        'proveedor',
        'usuario',
        'detalles.producto'
    ])->orderBy('fecha', 'desc');

    if ($fechaInicio) {
        $query->whereDate('fecha', '>=', $fechaInicio);
    }

    if ($fechaFin) {
        $query->whereDate('fecha', '<=', $fechaFin);
    }

    $compras = $query->get();

    $totalCompras = $compras->count();

    $subtotal = $compras->sum('subtotal');

    $impuestos = $compras->sum('impuesto');

    $total = $compras->sum('total');

    return view('reportes.compras', compact(
        'compras',
        'fechaInicio',
        'fechaFin',
        'totalCompras',
        'subtotal',
        'impuestos',
        'total'
    ));
}
}