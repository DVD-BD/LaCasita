<?php

namespace App\Http\Controllers;

use App\Models\Venta;

class VentaController extends Controller
{
    public function index()
    {
        return view('admin.ventas.index', [
            'ventas' => Venta::with(['cliente','empleado','sucursal','metodo','detalles.producto'])->orderByDesc('fecha')->paginate(12),
        ]);
    }
}
