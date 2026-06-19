<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'correo' => ['required', 'email', 'max:150'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $correo = strtolower(trim($credentials['correo']));

        $usuario = User::where('correo', $correo)->first();

        if (!$usuario || !Hash::check($credentials['password'], $usuario->password_hash)) {
            throw ValidationException::withMessages([
                'correo' => 'Las credenciales no coinciden con nuestros registros.',
            ])->redirectTo(route('login'));
        }

        if ($usuario->estado !== 'Activo') {
            throw ValidationException::withMessages([
                'correo' => 'La cuenta se encuentra inactiva o bloqueada.',
            ])->redirectTo(route('login'));
        }

        Auth::login($usuario, $request->boolean('remember'));

        /*
        |--------------------------------------------------------------------------
        | Seguridad de sesión
        |--------------------------------------------------------------------------
        | Regenera el ID de sesión después del inicio de sesión para evitar
        | reutilización de sesiones anteriores.
        */

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:120'],
            'telefono' => ['required', 'string', 'max:30'],
            'correo' => [
                'required',
                'email',
                'max:150',
                Rule::unique('usuario', 'correo'),
                Rule::unique('cliente', 'correo'),
            ],
            'ciudad' => ['required', 'string', 'max:80'],
            'codigo_postal' => ['nullable', 'string', 'max:12'],
            'direccion' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $correo = strtolower(trim($data['correo']));

        $cliente = Cliente::create([
            'nombre' => $data['nombre'],
            'telefono' => $data['telefono'],
            'correo' => $correo,
            'ciudad' => $data['ciudad'],
            'codigo_postal' => $data['codigo_postal'] ?? null,
            'direccion' => $data['direccion'],
            'estado' => 'Activo',
        ]);

        $usuario = User::create([
            'nombre' => $data['nombre'],
            'correo' => $correo,
            'password_hash' => Hash::make($data['password']),
            'rol' => 'cliente',
            'id_cliente' => $cliente->id_cliente,
            'estado' => 'Activo',
        ]);

        Auth::login($usuario);

        /*
        |--------------------------------------------------------------------------
        | Seguridad de sesión
        |--------------------------------------------------------------------------
        | Regenera el ID de sesión después del registro e inicio de sesión automático.
        */

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        /*
        |--------------------------------------------------------------------------
        | Cierre seguro de sesión
        |--------------------------------------------------------------------------
        | Invalida la sesión actual y regenera el token CSRF para evitar que una
        | URL protegida pueda seguir mostrando información por sesión anterior.
        */

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}