@extends('layouts.app')
@section('title','Formulario | La Casita')
@section('eyebrow','Administración')
@section('heading', $faq->exists ? 'Editar registro' : 'Agregar registro')
@section('content')
<section class="panel-card"><form class="form-grid" method="POST" action="{{ $faq->exists ? route('faqs.update',$faq) : route('faqs.store') }}">@csrf @if($faq->exists) @method('PUT') @endif <label>Pregunta<input class="input" type="text" name="pregunta" value="{{ old('pregunta',$faq->pregunta) }}"></label><label class="span-2">Respuesta<textarea class="input" name="respuesta">{{ old('respuesta',$faq->respuesta) }}</textarea></label><label>Categoría<input class="input" type="text" name="categoria" value="{{ old('categoria',$faq->categoria) }}"></label><label>Visible<select class="input" name="visible"><option value="1" @selected(old('visible',$faq->visible)==1)>Sí</option><option value="0" @selected(old('visible',$faq->visible)==0)>No</option></select></label><button class="primary-button span-2">Guardar</button></form></section>
@endsection
