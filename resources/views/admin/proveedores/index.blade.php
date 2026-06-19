@extends('layouts.app')
@section('title','Proveedores | La Casita')
@section('eyebrow','Administración')
@section('heading','Proveedores')
@section('content')
<section class="panel-card"><div class="panel-header"><div><p class="eyebrow">Gestión</p><h2>Proveedores</h2><p class="muted">Consulta, agrega y actualiza registros.</p></div><a class="primary-button" href="{{ route('proveedores.create') }}">Agregar</a></div><div class="table-wrap"><table><thead><tr><th>Nombre</th><th>Teléfono</th><th>Correo</th><th>Ciudad</th><th>Acciones</th></tr></thead><tbody>@foreach($proveedores as $proveedor)<tr><td>{{ $proveedor->nombre }}</td><td>{{ $proveedor->telefono }}</td><td>{{ $proveedor->correo }}</td><td>{{ $proveedor->ciudad }}</td><td><div class="row-actions"><a class="mini-button" href="{{ route('proveedores.edit',$proveedor) }}">Editar</a><form method="POST" action="{{ route('proveedores.destroy',$proveedor) }}">@csrf @method('DELETE')<button class="mini-button danger" onclick="return confirm('¿Desactivar registro?')">Desactivar</button></form></div></td></tr>@endforeach</tbody></table></div>{{ $proveedores->links() }}</section>
@endsection
