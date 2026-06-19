@extends('layouts.app')
@section('title','Categorias | La Casita')
@section('eyebrow','Administración')
@section('heading','Categorias')
@section('content')
<section class="panel-card"><div class="panel-header"><div><p class="eyebrow">Gestión</p><h2>Categorias</h2><p class="muted">Consulta, agrega y actualiza registros.</p></div><a class="primary-button" href="{{ route('categorias.create') }}">Agregar</a></div><div class="table-wrap"><table><thead><tr><th>Nombre</th><th>Descripción</th><th>Acciones</th></tr></thead><tbody>@foreach($categorias as $categoria)<tr><td>{{ $categoria->nombre }}</td><td>{{ $categoria->descripcion }}</td><td><div class="row-actions"><a class="mini-button" href="{{ route('categorias.edit',$categoria) }}">Editar</a><form method="POST" action="{{ route('categorias.destroy',$categoria) }}">@csrf @method('DELETE')<button class="mini-button danger" onclick="return confirm('¿Desactivar registro?')">Desactivar</button></form></div></td></tr>@endforeach</tbody></table></div>{{ $categorias->links() }}</section>
@endsection
