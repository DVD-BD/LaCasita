<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Faq;
use App\Models\Producto;
use App\Models\Promocion;
use App\Models\Sucursal;

class PublicController extends Controller
{
    public function home()
    {
        return view('home', [
            'categorias' => Categoria::orderBy('nombre')->get(),
            'productos' => Producto::with('categoria')->where('activo', true)->orderBy('nombre')->get(),
            'promociones' => Promocion::with('productos')->where('vigente', true)->orderBy('id_promocion')->get(),
            'sucursales' => Sucursal::where('estado', 'Activa')->orderBy('nombre')->get(),
            'faqs' => Faq::where('visible', true)->orderBy('id_faq')->get(),
        ]);
    }
}
