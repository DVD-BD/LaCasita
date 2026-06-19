@extends('layouts.app')
@section('title','Ventas | La Casita')
@section('eyebrow','Operación')
@section('heading','Ventas')
@section('content')
<section class="panel-card"><div class="panel-header"><div><p class="eyebrow">Historial</p><h2>Ventas registradas</h2></div></div><div class="table-wrap"><table><thead><tr><th>Folio</th><th>Cliente</th><th>Empleado</th><th>Sucursal</th><th>Fecha</th><th>Estado</th><th>Total</th></tr></thead><tbody>@foreach($ventas as $v)<tr><td>#{{ $v->id_venta }}</td><td>{{ $v->cliente->nombre ?? 'Público' }}</td><td>{{ $v->empleado->nombre ?? 'Venta en línea' }}</td><td>{{ $v->sucursal->nombre ?? 'Sin sucursal' }}</td><td>{{ $v->fecha->format('d/m/Y') }} {{ $v->hora }}</td><td><span class="status-badge {{ strtolower($v->estado) }}">{{ $v->estado }}</span></td><td>${{ number_format($v->total,2) }}</td></tr>@endforeach</tbody></table></div>{{ $ventas->links() }}</section>
@endsection
