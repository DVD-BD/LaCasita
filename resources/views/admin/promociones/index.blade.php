@extends('layouts.app')
@section('title','Promociones | La Casita')
@section('eyebrow','Marketing')
@section('heading','Promociones')
@section('content')
<section class="panel-card"><div class="panel-header"><div><p class="eyebrow">Ofertas</p><h2>Promociones vigentes y programadas</h2></div><a class="primary-button" href="{{ route('promociones.create') }}">Agregar promoción</a></div><div class="promo-grid">@foreach($promociones as $p)<article class="promo-card"><div class="promo-card-media"><img src="{{ asset('assets/img/'.($p->imagen ?: 'slider.png')) }}" alt="{{ $p->nombre }}"></div><p class="eyebrow">{{ $p->fecha_inicio->format('d/m/Y') }} al {{ $p->fecha_fin->format('d/m/Y') }}</p><h3>{{ $p->nombre }}</h3><div class="discount">{{ number_format($p->descuento,0) }}% OFF</div><p class="muted">{{ $p->descripcion }}</p><div class="row-actions"><a class="mini-button" href="{{ route('promociones.edit',$p) }}">Editar</a><form method="POST" action="{{ route('promociones.destroy',$p) }}">@csrf @method('DELETE')<button class="mini-button danger">Desactivar</button></form></div></article>@endforeach</div>{{ $promociones->links() }}</section>
@endsection
