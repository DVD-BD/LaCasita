@extends('layouts.app')
@section('title','Mis compras | La Casita')
@section('eyebrow','Cliente')
@section('heading','Historial de compras')
@section('content')
<section class="panel-card">@forelse($ventas as $venta)<article class="info-card"><strong>Venta #{{ $venta->id_venta }} · {{ $venta->fecha->format('d/m/Y') }}</strong><p class="muted">Sucursal: {{ $venta->sucursal->nombre ?? 'Sin sucursal' }} · Método: {{ $venta->metodo->nombre ?? 'N/A' }}</p><p>Total: <span class="price">${{ number_format($venta->total,2) }}</span></p></article>@empty<div class="empty-state">Aún no hay compras registradas.</div>@endforelse</section>
@endsection
