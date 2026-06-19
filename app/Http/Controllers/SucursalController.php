<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SucursalController extends Controller
{
    public function index()
    {
        return view('admin.sucursales.index', [
            'sucursales' => Sucursal::orderBy('nombre')->paginate(12),
        ]);
    }

    public function create()
    {
        return view('admin.sucursales.form', ['sucursal' => new Sucursal()]);
    }

    public function store(Request $request)
    {
        Sucursal::create($this->validateData($request));
        return redirect()->route('sucursales.index')->with('status', 'Registro guardado correctamente.');
    }

    public function edit(Sucursal $sucursal)
    {
        return view('admin.sucursales.form', ['sucursal' => $sucursal]);
    }

    public function update(Request $request, Sucursal $sucursal)
    {
        $sucursal->update($this->validateData($request, $sucursal->getKey()));
        return redirect()->route('sucursales.index')->with('status', 'Registro actualizado correctamente.');
    }

    public function destroy(Sucursal $sucursal)
    {
        if (in_array('estado', ['nombre', 'direccion', 'telefono', 'ciudad', 'estado', 'latitud', 'longitud', 'url_maps'], true)) {
            $sucursal->update(['estado' => str_contains(Sucursal::class, 'Sucursal') ? 'Inactiva' : 'Inactivo']);
        } elseif (in_array('visible', ['nombre', 'direccion', 'telefono', 'ciudad', 'estado', 'latitud', 'longitud', 'url_maps'], true)) {
            $sucursal->update(['visible' => false]);
        } else {
            $sucursal->delete();
        }
        return redirect()->route('sucursales.index')->with('status', 'Registro desactivado correctamente.');
    }

    private function validateData(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'nombre' => ['required','string','max:100'],
            'direccion' => ['required','string','max:255'],
            'telefono' => ['nullable','string','max:30'],
            'ciudad' => ['nullable','string','max:80'],
            'estado' => ['required', Rule::in(['Activa','Inactiva'])],
            'latitud' => ['nullable','numeric'],
            'longitud' => ['nullable','numeric'],
            'url_maps' => ['nullable','url','max:500']
        ]);
    }
}
