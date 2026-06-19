<?php

use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        /*
        |--------------------------------------------------------------------------
        | Alias de middlewares personalizados
        |--------------------------------------------------------------------------
        | Permite usar el middleware de roles en routes/web.php con:
        | ->middleware('role:administrador')
        | ->middleware('role:administrador,empleado')
        | ->middleware('role:cliente')
        */

        $middleware->alias([
            'role' => RoleMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        /*
        |--------------------------------------------------------------------------
        | Manejo de excepciones
        |--------------------------------------------------------------------------
        | Laravel mantiene la configuración predeterminada para errores 403, 404,
        | 419 y 500.
        */
    })
    ->create();