@extends('layouts.app')
@section('title','Clientes | La Casita')
@section('eyebrow','Administración')
@section('heading','Clientes')
@section('content')
<section class="panel-card"><div class="panel-header"><div><p class="eyebrow">Gestión</p><h2>Clientes</h2><p class="muted">Consulta, agrega y actualiza registros.</p></div><a class="primary-button" href="{{ route('clientes.create') }}">Agregar</a></div><div class="table-wrap"><table><thead><tr><th>Nombre</th><th>Teléfono</th><th>Correo</th><th>Ciudad</th><th>Acciones</th></tr></thead><tbody>@foreach($clientes as $cliente)<tr><td>{{ $cliente->nombre }}</td><td>{{ $cliente->telefono }}</td><td>{{ $cliente->correo }}</td><td>{{ $cliente->ciudad }}</td><td><div class="row-actions"><a class="mini-button" href="{{ route('clientes.edit',$cliente) }}">Editar</a><form method="POST" action="{{ route('clientes.destroy',$cliente) }}">@csrf @method('DELETE')<button class="mini-button danger" onclick="return confirm('¿Desactivar registro?')">Desactivar</button></form></div></td></tr>@endforeach</tbody></table></div>{{ $clientes->links() }}</section>
@endsection
