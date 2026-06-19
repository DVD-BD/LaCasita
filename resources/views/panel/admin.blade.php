@extends('layouts.app')
@section('title','Administrador | La Casita')
@section('eyebrow','Administrador')
@section('heading','Panel de control')
@section('content')
<div class="stats-grid">
  <article class="stat-card"><span>Productos activos</span><strong>{{ $stats['productos'] }}</strong><small>Catálogo disponible</small></article>
  <article class="stat-card"><span>Clientes activos</span><strong>{{ $stats['clientes'] }}</strong><small>Compradores registrados</small></article>
  <article class="stat-card"><span>Empleados activos</span><strong>{{ $stats['empleados'] }}</strong><small>Operación interna</small></article>
  <article class="stat-card"><span>Ventas registradas</span><strong>{{ $stats['ventas'] }}</strong><small>Historial comercial</small></article>
</div>
<section class="panel-card">
  <div class="panel-header">
    <div>
      <p class="eyebrow">Operación general</p>
      <h2>Centro de administración de La Casita</h2>
      <p class="muted">Gestiona catálogo, clientes, empleados, proveedores, sucursales, promociones, FAQ e inventario desde un panel privado.</p>
    </div>
  </div>
  <div class="cards-grid dashboard-actions">
    <a class="info-card" data-icon="🛒" href="{{ route('productos.index') }}">Productos</a>
    <a class="info-card" data-icon="📦" href="{{ route('inventario.index') }}">Inventario</a>
    <a class="info-card" data-icon="💳" href="{{ route('ventas.index') }}">Ventas</a>
    <a class="info-card" data-icon="👥" href="{{ route('clientes.index') }}">Clientes</a>
    <a class="info-card" data-icon="🧑‍💼" href="{{ route('empleados.index') }}">Empleados</a>
    <a class="info-card" data-icon="🚚" href="{{ route('proveedores.index') }}">Proveedores</a>
    <a class="info-card" data-icon="📍" href="{{ route('sucursales.index') }}">Sucursales</a>
    <a class="info-card" data-icon="🔥" href="{{ route('promociones.index') }}">Promociones</a>
  </div>
</section>
@endsection
