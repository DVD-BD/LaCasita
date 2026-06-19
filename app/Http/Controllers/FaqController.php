<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FaqController extends Controller
{
    public function index()
    {
        return view('admin.faqs.index', [
            'faqs' => Faq::orderBy('pregunta')->paginate(12),
        ]);
    }

    public function create()
    {
        return view('admin.faqs.form', ['faq' => new Faq()]);
    }

    public function store(Request $request)
    {
        Faq::create($this->validateData($request));
        return redirect()->route('faqs.index')->with('status', 'Registro guardado correctamente.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.form', ['faq' => $faq]);
    }

    public function update(Request $request, Faq $faq)
    {
        $faq->update($this->validateData($request, $faq->getKey()));
        return redirect()->route('faqs.index')->with('status', 'Registro actualizado correctamente.');
    }

    public function destroy(Faq $faq)
    {
        if (in_array('estado', ['pregunta', 'respuesta', 'categoria', 'visible'], true)) {
            $faq->update(['estado' => str_contains(Faq::class, 'Sucursal') ? 'Inactiva' : 'Inactivo']);
        } elseif (in_array('visible', ['pregunta', 'respuesta', 'categoria', 'visible'], true)) {
            $faq->update(['visible' => false]);
        } else {
            $faq->delete();
        }
        return redirect()->route('faqs.index')->with('status', 'Registro desactivado correctamente.');
    }

    private function validateData(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'pregunta' => ['required','string','max:255'],
            'respuesta' => ['required','string'],
            'categoria' => ['nullable','string','max:80'],
            'visible' => ['required','boolean']
        ]);
    }
}
