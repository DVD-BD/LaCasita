@extends('layouts.app')
@section('title','Faqs | La Casita')
@section('eyebrow','Administración')
@section('heading','Faqs')
@section('content')
<section class="panel-card"><div class="panel-header"><div><p class="eyebrow">Gestión</p><h2>Faqs</h2><p class="muted">Consulta, agrega y actualiza registros.</p></div><a class="primary-button" href="{{ route('faqs.create') }}">Agregar</a></div><div class="table-wrap"><table><thead><tr><th>Pregunta</th><th>Respuesta</th><th>Categoría</th><th>Visible</th><th>Acciones</th></tr></thead><tbody>@foreach($faqs as $faq)<tr><td>{{ $faq->pregunta }}</td><td>{{ $faq->respuesta }}</td><td>{{ $faq->categoria }}</td><td>{{ $faq->visible }}</td><td><div class="row-actions"><a class="mini-button" href="{{ route('faqs.edit',$faq) }}">Editar</a><form method="POST" action="{{ route('faqs.destroy',$faq) }}">@csrf @method('DELETE')<button class="mini-button danger" onclick="return confirm('¿Desactivar registro?')">Desactivar</button></form></div></td></tr>@endforeach</tbody></table></div>{{ $faqs->links() }}</section>
@endsection
