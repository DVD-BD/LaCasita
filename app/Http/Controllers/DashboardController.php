<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Sucursal;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $usuario = Auth::user();
        $stats = [
            'productos' => Producto::where('activo', true)->count(),
            'clientes' => Cliente::where('estado', 'Activo')->count(),
            'empleados' => Empleado::where('estado', 'Activo')->count(),
            'proveedores' => Proveedor::where('estado', 'Activo')->count(),
            'sucursales' => Sucursal::where('estado', 'Activa')->count(),
            'ventas' => Venta::count(),
            'total_ventas' => Venta::sum('total'),
        ];

        return match ($usuario->rol) {
            'administrador' => view('panel.admin', compact('stats')),
            'empleado' => view('panel.empleado', compact('stats')),
            default => view('panel.cliente', compact('stats')),
        };
    }
}
