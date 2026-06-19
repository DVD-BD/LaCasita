<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProveedorController extends Controller
{
    public function index()
    {
        return view('admin.proveedores.index', [
            'proveedores' => Proveedor::orderBy('nombre')->paginate(12),
        ]);
    }

    public function create()
    {
        return view('admin.proveedores.form', ['proveedor' => new Proveedor()]);
    }

    public function store(Request $request)
    {
        Proveedor::create($this->validateData($request));
        return redirect()->route('proveedores.index')->with('status', 'Registro guardado correctamente.');
    }

    public function edit(Proveedor $proveedor)
    {
        return view('admin.proveedores.form', ['proveedor' => $proveedor]);
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $proveedor->update($this->validateData($request, $proveedor->getKey()));
        return redirect()->route('proveedores.index')->with('status', 'Registro actualizado correctamente.');
    }

    public function destroy(Proveedor $proveedor)
    {
        if (in_array('estado', ['nombre', 'telefono', 'correo', 'ciudad', 'codigo_postal', 'direccion', 'estado'], true)) {
            $proveedor->update(['estado' => str_contains(Proveedor::class, 'Sucursal') ? 'Inactiva' : 'Inactivo']);
        } elseif (in_array('visible', ['nombre', 'telefono', 'correo', 'ciudad', 'codigo_postal', 'direccion', 'estado'], true)) {
            $proveedor->update(['visible' => false]);
        } else {
            $proveedor->delete();
        }
        return redirect()->route('proveedores.index')->with('status', 'Registro desactivado correctamente.');
    }

    private function validateData(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'nombre' => ['required','string','max:120'],
            'telefono' => ['nullable','string','max:30'],
            'correo' => ['nullable','email','max:150'],
            'ciudad' => ['nullable','string','max:80'],
            'codigo_postal' => ['nullable','string','max:12'],
            'direccion' => ['nullable','string','max:255'],
            'estado' => ['required', Rule::in(['Activo','Inactivo'])]
        ]);
    }
}
