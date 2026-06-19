<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $usuario = Auth::user();

        if (!$usuario) {
            return redirect()->guest(route('login'))->with('status', 'Primero inicia sesión.');
        }

        if ($usuario->estado !== 'Activo') {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->withErrors([
                'correo' => 'La cuenta no está activa.',
            ]);
        }

        if (!in_array($usuario->rol, $roles, true)) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }

        $response = $next($request);

        /*
        |--------------------------------------------------------------------------
        | Protección de caché en rutas privadas por rol
        |--------------------------------------------------------------------------
        | Evita que el navegador guarde pantallas protegidas después de cerrar sesión.
        */

        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');

        return $response;
    }
}