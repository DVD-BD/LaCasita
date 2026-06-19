<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['categoria', 'proveedor'])
            ->orderBy('nombre')
            ->paginate(10)
            ->withQueryString();

        return view('admin.productos.index', [
            'productos' => $productos,
        ]);
    }

    public function create()
    {
        return view('admin.productos.form', [
            'producto' => new Producto([
                'activo' => true,
                'imagen' => 'fondo.png',
            ]),
            'categorias' => Categoria::orderBy('nombre')->get(),
            'proveedores' => Proveedor::where('estado', 'Activo')->orderBy('nombre')->get(),
            'imagenes' => $this->imagenes(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        Producto::create($data);

        return redirect()
            ->route('productos.index')
            ->with('status', 'Producto agregado correctamente.');
    }

    public function edit(Producto $producto)
    {
        return view('admin.productos.form', [
            'producto' => $producto,
            'categorias' => Categoria::orderBy('nombre')->get(),
            'proveedores' => Proveedor::where('estado', 'Activo')->orderBy('nombre')->get(),
            'imagenes' => $this->imagenes(),
        ]);
    }

    public function update(Request $request, Producto $producto)
    {
        $data = $this->validateData($request, $producto->id_producto);

        $producto->update($data);

        return redirect()
            ->route('productos.index')
            ->with('status', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->update([
            'activo' => false,
        ]);

        return redirect()
            ->route('productos.index')
            ->with('status', 'Producto desactivado sin borrar historial.');
    }

    private function validateData(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'nombre' => ['required', 'string', 'max:120'],
            'descripcion' => ['nullable', 'string', 'max:800'],
            'codigo_barras' => [
                'required',
                'string',
                'max:40',
                Rule::unique('producto', 'codigo_barras')->ignore($id, 'id_producto'),
            ],
            'precio' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'id_categoria' => ['required', 'exists:categoria,id_categoria'],
            'id_proveedor' => ['nullable', 'exists:proveedor,id_proveedor'],
            'imagen' => ['nullable', 'string', 'max:255'],
            'activo' => ['required', 'boolean'],
        ]);
    }

    private function imagenes(): array
    {
        return [
            'agua.jpg',
            'cafe.jpg',
            'chocolate.jpg',
            'cocacola.jpg',
            'galletas.jpg',
            'jabon.jpg',
            'lechuga.jpg',
            'limpiadormultiusos.jpg',
            'manzana.jpg',
            'papasfritas.jpg',
            'trapeador.jpg',
            'relojdepared.jpg',
            'pepsi.jpg',
            'jugodenaranja.jpg',
            'nachos.jpg',
            'palomitas.jpg',
            'platanos.jpg',
            'tomate.jpg',
            'zanahoria.jpg',
            'detergente.jpg',
            'escoba.jpg',
            'cojin.jpg',
            'lampara.jpg',
            'mantacobija.jpg',
            'sabanas.jpg',
            'aceite.jpg',
            'arroz.jpeg',
            'azucar.jpeg',
            'croquetas.jpg',
            'frijol.jpeg',
            'pan.jpg',
            'pancaja.jpg',
            'pasta.jpeg',
            'queso.jfif',
            'shampoo.jpg',
            'fondo.png',
        ];
    }
}