<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Promocion;
use Illuminate\Http\Request;

class PromocionController extends Controller
{
    public function index()
    {
        return view('admin.promociones.index', [
            'promociones' => Promocion::with('productos')->orderByDesc('fecha_inicio')->paginate(12),
        ]);
    }

    public function create()
    {
        return view('admin.promociones.form', [
            'promocion' => new Promocion(['vigente' => true, 'imagen' => 'promo1.jpeg']),
            'productos' => Producto::where('activo', true)->orderBy('nombre')->get(),
            'seleccionados' => [],
            'imagenes' => ['promo1.jpeg','promo2.jpeg','promo3.jpeg','promo4.jpeg','promo5.jpeg','promo6.jpeg','slider.png'],
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $productos = $data['productos'] ?? [];
        unset($data['productos']);
        $promo = Promocion::create($data);
        $promo->productos()->sync($productos);
        return redirect()->route('promociones.index')->with('status', 'Promoción guardada correctamente.');
    }

    public function edit(Promocion $promocion)
    {
        return view('admin.promociones.form', [
            'promocion' => $promocion,
            'productos' => Producto::where('activo', true)->orderBy('nombre')->get(),
            'seleccionados' => $promocion->productos()->pluck('producto.id_producto')->toArray(),
            'imagenes' => ['promo1.jpeg','promo2.jpeg','promo3.jpeg','promo4.jpeg','promo5.jpeg','promo6.jpeg','slider.png'],
        ]);
    }

    public function update(Request $request, Promocion $promocion)
    {
        $data = $this->validateData($request);
        $productos = $data['productos'] ?? [];
        unset($data['productos']);
        $promocion->update($data);
        $promocion->productos()->sync($productos);
        return redirect()->route('promociones.index')->with('status', 'Promoción actualizada correctamente.');
    }

    public function destroy(Promocion $promocion)
    {
        $promocion->update(['vigente' => false]);
        return redirect()->route('promociones.index')->with('status', 'Promoción desactivada correctamente.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'nombre' => ['required','string','max:120'],
            'descuento' => ['required','numeric','min:0','max:100'],
            'fecha_inicio' => ['required','date'],
            'fecha_fin' => ['required','date','after_or_equal:fecha_inicio'],
            'vigente' => ['required','boolean'],
            'descripcion' => ['nullable','string','max:800'],
            'imagen' => ['nullable','string','max:255'],
            'productos' => ['array'],
            'productos.*' => ['exists:producto,id_producto'],
        ]);
    }
}
