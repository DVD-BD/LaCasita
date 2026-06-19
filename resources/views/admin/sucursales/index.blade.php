@extends('layouts.app')
@section('title','Sucursales | La Casita')
@section('eyebrow','Administración')
@section('heading','Sucursales')
@section('content')
<section class="panel-card"><div class="panel-header"><div><p class="eyebrow">Gestión</p><h2>Sucursales</h2><p class="muted">Consulta, agrega y actualiza registros.</p></div><a class="primary-button" href="{{ route('sucursales.create') }}">Agregar</a></div><div class="table-wrap"><table><thead><tr><th>Nombre</th><th>Dirección</th><th>Teléfono</th><th>Ciudad</th><th>Acciones</th></tr></thead><tbody>@foreach($sucursales as $sucursal)<tr><td>{{ $sucursal->nombre }}</td><td>{{ $sucursal->direccion }}</td><td>{{ $sucursal->telefono }}</td><td>{{ $sucursal->ciudad }}</td><td><div class="row-actions"><a class="mini-button" href="{{ route('sucursales.edit',$sucursal) }}">Editar</a><form method="POST" action="{{ route('sucursales.destroy',$sucursal) }}">@csrf @method('DELETE')<button class="mini-button danger" onclick="return confirm('¿Desactivar registro?')">Desactivar</button></form></div></td></tr>@endforeach</tbody></table></div>{{ $sucursales->links() }}</section>
@endsection
