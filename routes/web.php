<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClientePanelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/

Route::get('/', [PublicController::class, 'home'])->name('home');

/*
|--------------------------------------------------------------------------
| Rutas para usuarios no autenticados
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');

    Route::get('/registro', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/registro', [AuthController::class, 'register'])->name('register.store');
});

/*
|--------------------------------------------------------------------------
| Rutas protegidas por sesión
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Rutas para administrador y empleado
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:administrador,empleado')->group(function () {
        Route::resource('productos', ProductoController::class)->except(['show']);

        Route::get('ventas', [VentaController::class, 'index'])->name('ventas.index');

        Route::get('inventario', [InventarioController::class, 'index'])->name('inventario.index');
    });

    /*
    |--------------------------------------------------------------------------
    | Rutas solo para administrador
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:administrador')->group(function () {
        Route::resource('categorias', CategoriaController::class)
            ->parameters(['categorias' => 'categoria'])
            ->except(['show']);

        Route::resource('clientes', ClienteController::class)
            ->parameters(['clientes' => 'cliente'])
            ->except(['show']);

        Route::resource('empleados', EmpleadoController::class)
            ->parameters(['empleados' => 'empleado'])
            ->except(['show']);

        Route::resource('proveedores', ProveedorController::class)
            ->parameters(['proveedores' => 'proveedor'])
            ->except(['show']);

        Route::resource('sucursales', SucursalController::class)
            ->parameters(['sucursales' => 'sucursal'])
            ->except(['show']);

        Route::resource('promociones', PromocionController::class)
            ->parameters(['promociones' => 'promocion'])
            ->except(['show']);

        Route::resource('faqs', FaqController::class)
            ->parameters(['faqs' => 'faq'])
            ->except(['show']);
    });

    /*
    |--------------------------------------------------------------------------
    | Rutas para cliente
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:cliente')->prefix('cliente')->name('cliente.')->group(function () {
        Route::get('/catalogo', [ClientePanelController::class, 'catalogo'])->name('catalogo');
        Route::get('/compras', [ClientePanelController::class, 'compras'])->name('compras');

        Route::post('/compras/{producto}', [ClientePanelController::class, 'comprar'])
            ->name('compras.store');
    });
});

/*
|--------------------------------------------------------------------------
| Ruta de respaldo
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});