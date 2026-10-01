<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Mostrar todas las categorías.
     */
    public function index()
    {
        $categorias = Categoria::orderBy('id', 'desc')->get();

        return view('categorias.index', compact('categorias'));
    }

    /**
     * Mostrar formulario para crear una categoría.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Guardar una nueva categoría.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100|unique:categorias,nombre',
            'descripcion' => 'nullable|string',
            'estado' => 'boolean',
        ]);

        Categoria::create($validated);

        return redirect()
            ->route('categorias.index')
            ->with('success', 'Categoría creada correctamente.');
    }

    /**
     * Mostrar una categoría.
     */
    public function show(Categoria $categoria)
    {
        $categoria->load('productos');

        return view('categorias.show', compact('categoria'));
    }

    /**
     * Mostrar formulario para editar.
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Actualizar una categoría.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100|unique:categorias,nombre,' . $categoria->id,
            'descripcion' => 'nullable|string',
            'estado' => 'boolean',
        ]);

        $categoria->update($validated);

        return redirect()
            ->route('categorias.index')
            ->with('success', 'Categoría actualizada correctamente.');
    }

    /**
     * Eliminar una categoría.
     */
    public function destroy(Categoria $categoria)
    {
        if ($categoria->productos()->exists()) {
            return redirect()
                ->route('categorias.index')
                ->with('error', 'No se puede eliminar una categoría que tiene productos asociados.');
        }

        $categoria->delete();

        return redirect()
            ->route('categorias.index')
            ->with('success', 'Categoría eliminada correctamente.');
    }
}