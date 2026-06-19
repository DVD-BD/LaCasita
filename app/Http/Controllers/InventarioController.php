<?php

namespace App\Http\Controllers;

use App\Models\Inventario;

class InventarioController extends Controller
{
    public function index()
    {
        $inventario = Inventario::with(['producto.categoria', 'sucursal'])
            ->orderBy('id_sucursal')
            ->orderBy('id_producto')
            ->paginate(10)
            ->withQueryString();

        return view('admin.inventario.index', [
            'inventario' => $inventario,
        ]);
    }
}