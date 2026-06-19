<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Puesto;
use App\Models\Sucursal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class EmpleadoController extends Controller
{
    public function index()
    {
        return view('admin.empleados.index', [
            'empleados' => Empleado::with(['puesto','sucursal'])->orderBy('nombre')->paginate(12),
        ]);
    }

    public function create()
    {
        return view('admin.empleados.form', [
            'empleado' => new Empleado(['estado' => 'Activo', 'nivel_responsabilidad' => 'Media']),
            'puestos' => Puesto::orderBy('nombre')->get(),
            'sucursales' => Sucursal::where('estado', 'Activa')->orderBy('nombre')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $password = $data['password'] ?? '123456';
        unset($data['password']);
        $empleado = Empleado::create($data);
        User::create([
            'nombre' => $empleado->nombre,
            'correo' => $empleado->correo,
            'password_hash' => Hash::make($password),
            'rol' => $request->input('rol', 'empleado'),
            'id_empleado' => $empleado->id_empleado,
            'estado' => $empleado->estado,
        ]);
        return redirect()->route('empleados.index')->with('status', 'Empleado y usuario creados correctamente.');
    }

    public function edit(Empleado $empleado)
    {
        return view('admin.empleados.form', [
            'empleado' => $empleado,
            'usuario' => User::where('id_empleado', $empleado->id_empleado)->first(),
            'puestos' => Puesto::orderBy('nombre')->get(),
            'sucursales' => Sucursal::where('estado', 'Activa')->orderBy('nombre')->get(),
        ]);
    }

    public function update(Request $request, Empleado $empleado)
    {
        $data = $this->validateData($request, $empleado->id_empleado);
        $password = $data['password'] ?? null;
        unset($data['password']);
        $empleado->update($data);
        $usuario = User::firstOrNew(['id_empleado' => $empleado->id_empleado]);
        $usuario->fill([
            'nombre' => $empleado->nombre,
            'correo' => $empleado->correo,
            'rol' => $request->input('rol', $usuario->rol ?: 'empleado'),
            'estado' => $empleado->estado,
        ]);
        if ($password) { $usuario->password_hash = Hash::make($password); }
        if (!$usuario->exists && !$password) { $usuario->password_hash = Hash::make('123456'); }
        $usuario->save();
        return redirect()->route('empleados.index')->with('status', 'Empleado actualizado correctamente.');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->update(['estado' => 'Inactivo']);
        User::where('id_empleado', $empleado->id_empleado)->update(['estado' => 'Inactivo']);
        return redirect()->route('empleados.index')->with('status', 'Empleado desactivado correctamente.');
    }

    private function validateData(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'nombre' => ['required','string','max:120'],
            'telefono' => ['nullable','string','max:30'],
            'correo' => ['required','email','max:150', Rule::unique('empleado','correo')->ignore($id,'id_empleado')],
            'id_puesto' => ['required','exists:puesto,id_puesto'],
            'id_sucursal' => ['required','exists:sucursal,id_sucursal'],
            'nivel_responsabilidad' => ['required', Rule::in(['Baja','Media','Alta'])],
            'bono' => ['nullable','numeric','min:0'],
            'estado' => ['required', Rule::in(['Activo','Inactivo'])],
            'rol' => ['required', Rule::in(['empleado','administrador'])],
            'password' => ['nullable','string','min:6'],
        ]);
    }
}
