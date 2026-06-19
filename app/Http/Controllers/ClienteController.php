<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClienteController extends Controller
{
    public function index()
    {
        return view('admin.clientes.index', [
            'clientes' => Cliente::orderBy('nombre')->paginate(12),
        ]);
    }

    public function create()
    {
        return view('admin.clientes.form', ['cliente' => new Cliente()]);
    }

    public function store(Request $request)
    {
        Cliente::create($this->validateData($request));
        return redirect()->route('clientes.index')->with('status', 'Registro guardado correctamente.');
    }

    public function edit(Cliente $cliente)
    {
        return view('admin.clientes.form', ['cliente' => $cliente]);
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($this->validateData($request, $cliente->getKey()));
        return redirect()->route('clientes.index')->with('status', 'Registro actualizado correctamente.');
    }

    public function destroy(Cliente $cliente)
    {
        if (in_array('estado', ['nombre', 'telefono', 'correo', 'ciudad', 'codigo_postal', 'direccion', 'estado'], true)) {
            $cliente->update(['estado' => str_contains(Cliente::class, 'Sucursal') ? 'Inactiva' : 'Inactivo']);
        } elseif (in_array('visible', ['nombre', 'telefono', 'correo', 'ciudad', 'codigo_postal', 'direccion', 'estado'], true)) {
            $cliente->update(['visible' => false]);
        } else {
            $cliente->delete();
        }
        return redirect()->route('clientes.index')->with('status', 'Registro desactivado correctamente.');
    }

    private function validateData(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'nombre' => ['required','string','max:120'],
            'telefono' => ['nullable','string','max:30'],
            'correo' => ['required','email','max:150'],
            'ciudad' => ['nullable','string','max:80'],
            'codigo_postal' => ['nullable','string','max:12'],
            'direccion' => ['nullable','string','max:255'],
            'estado' => ['required', Rule::in(['Activo','Inactivo'])]
        ]);
    }
}
