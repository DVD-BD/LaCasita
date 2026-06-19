@extends('layouts.app')
@section('title','Cliente | La Casita')
@section('eyebrow','Cliente')
@section('heading','Mi cuenta')
@section('content')
<section class="panel-card">
  <div class="panel-header"><div><p class="eyebrow">Bienvenido</p><h2>Tu espacio en La Casita</h2><p class="muted">Consulta productos, revisa promociones y visualiza tus compras registradas.</p></div></div>
  <div class="cards-grid dashboard-actions">
    <a class="info-card" data-icon="🛍️" href="{{ route('cliente.catalogo') }}">Ver catálogo</a>
    <a class="info-card" data-icon="🧾" href="{{ route('cliente.compras') }}">Mis compras</a>
    <a class="info-card" data-icon="🔥" href="{{ route('home') }}#ofertas">Ofertas públicas</a>
  </div>
</section>
@endsection
