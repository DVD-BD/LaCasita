@extends('layouts.app')
@section('title','Empleados | La Casita')
@section('eyebrow','Administración')
@section('heading','Empleados')
@section('content')
<section class="panel-card"><div class="panel-header"><div><p class="eyebrow">Equipo</p><h2>Empleados registrados</h2><p class="muted">Administra sucursal, puesto, estado y rol de acceso.</p></div><a class="primary-button" href="{{ route('empleados.create') }}">Agregar empleado</a></div><div class="table-wrap"><table><thead><tr><th>Empleado</th><th>Puesto</th><th>Sucursal</th><th>Responsabilidad</th><th>Estado</th><th>Acciones</th></tr></thead><tbody>@foreach($empleados as $e)<tr><td><strong>{{ $e->nombre }}</strong><br><span class="muted">{{ $e->correo }}</span></td><td>{{ $e->puesto->nombre ?? 'Sin puesto' }}</td><td>{{ $e->sucursal->nombre ?? 'Sin sucursal' }}</td><td>{{ $e->nivel_responsabilidad }}</td><td><span class="status-badge {{ strtolower($e->estado) }}">{{ $e->estado }}</span></td><td><div class="row-actions"><a class="mini-button" href="{{ route('empleados.edit',$e) }}">Editar</a><form method="POST" action="{{ route('empleados.destroy',$e) }}">@csrf @method('DELETE')<button class="mini-button danger" onclick="return confirm('¿Desactivar empleado?')">Desactivar</button></form></div></td></tr>@endforeach</tbody></table></div>{{ $empleados->links() }}</section>
@endsection
