<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Promocion;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientePanelController extends Controller
{
    public function catalogo()
    {
        return view('panel.catalogo', [
            'productos' => Producto::with('categoria')
                ->where('activo', true)
                ->orderBy('nombre')
                ->get(),

            'promociones' => Promocion::where('vigente', true)
                ->orderBy('nombre')
                ->get(),
        ]);
    }

    public function compras()
    {
        $usuario = Auth::user();

        return view('panel.compras', [
            'ventas' => Venta::with(['detalles.producto', 'sucursal', 'metodo'])
                ->where('id_cliente', $usuario->id_cliente)
                ->orderByDesc('fecha')
                ->get(),
        ]);
    }

    public function comprar($producto)
    {
        DB::transaction(function () use ($producto) {
            $producto = Producto::whereKey($producto)
                ->lockForUpdate()
                ->firstOrFail();

            if ($producto->stock <= 0) {
                abort(409, 'El producto seleccionado no tiene stock disponible.');
            }

            $producto->decrement('stock');
        });

        return redirect()
            ->route('cliente.catalogo')
            ->with('success', 'Compra realizada correctamente.');
    }
}