@extends('layouts.app')
@section('title','Empleado | La Casita')
@section('eyebrow','Empleado')
@section('heading','Panel operativo')
@section('content')
<div class="stats-grid">
  <article class="stat-card"><span>Productos</span><strong>{{ $stats['productos'] }}</strong><small>Disponibles para venta</small></article>
  <article class="stat-card"><span>Ventas</span><strong>{{ $stats['ventas'] }}</strong><small>Registros capturados</small></article>
  <article class="stat-card"><span>Total ventas</span><strong>${{ number_format($stats['total_ventas'],2) }}</strong><small>Acumulado</small></article>
</div>
<section class="panel-card">
  <div class="panel-header"><div><p class="eyebrow">Trabajo diario</p><h2>Accesos rápidos de operación</h2><p class="muted">Consulta ventas, revisa inventario y actualiza productos permitidos.</p></div></div>
  <div class="cards-grid dashboard-actions">
    <a class="info-card" data-icon="🛒" href="{{ route('productos.index') }}">Productos</a>
    <a class="info-card" data-icon="📦" href="{{ route('inventario.index') }}">Inventario</a>
    <a class="info-card" data-icon="💳" href="{{ route('ventas.index') }}">Ventas</a>
    <a class="info-card" data-icon="👥" href="{{ route('clientes.index') }}">Clientes</a>
  </div>
</section>
@endsection
