<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoriaController extends Controller
{
    public function index()
    {
        return view('admin.categorias.index', [
            'categorias' => Categoria::orderBy('nombre')->paginate(12),
        ]);
    }

    public function create()
    {
        return view('admin.categorias.form', ['categoria' => new Categoria()]);
    }

    public function store(Request $request)
    {
        Categoria::create($this->validateData($request));
        return redirect()->route('categorias.index')->with('status', 'Registro guardado correctamente.');
    }

    public function edit(Categoria $categoria)
    {
        return view('admin.categorias.form', ['categoria' => $categoria]);
    }

    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update($this->validateData($request, $categoria->getKey()));
        return redirect()->route('categorias.index')->with('status', 'Registro actualizado correctamente.');
    }

    public function destroy(Categoria $categoria)
    {
        if (in_array('estado', ['nombre', 'descripcion'], true)) {
            $categoria->update(['estado' => str_contains(Categoria::class, 'Sucursal') ? 'Inactiva' : 'Inactivo']);
        } elseif (in_array('visible', ['nombre', 'descripcion'], true)) {
            $categoria->update(['visible' => false]);
        } else {
            $categoria->delete();
        }
        return redirect()->route('categorias.index')->with('status', 'Registro desactivado correctamente.');
    }

    private function validateData(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'nombre' => ['required','string','max:80', Rule::unique('categoria','nombre')->ignore($id,'id_categoria')],
            'descripcion' => ['nullable','string','max:255']
        ]);
    }
}
