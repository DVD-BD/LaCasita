@extends('layouts.app')
@section('title','Formulario | La Casita')
@section('eyebrow','Administración')
@section('heading', $categoria->exists ? 'Editar registro' : 'Agregar registro')
@section('content')
<section class="panel-card"><form class="form-grid" method="POST" action="{{ $categoria->exists ? route('categorias.update',$categoria) : route('categorias.store') }}">@csrf @if($categoria->exists) @method('PUT') @endif <label>Nombre<input class="input" type="text" name="nombre" value="{{ old('nombre',$categoria->nombre) }}"></label><label class="span-2">Descripción<textarea class="input" name="descripcion">{{ old('descripcion',$categoria->descripcion) }}</textarea></label><button class="primary-button span-2">Guardar</button></form></section>
@endsection
