@extends('layouts.app')

@section('title', 'Productos | La Casita')
@section('eyebrow', 'Catálogo')
@section('heading', 'Productos')

@section('content')
<section class="panel-card">

    <style>
        .pagination-clean {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-top: 18px;
            flex-wrap: wrap;
        }

        .pagination-info {
            font-size: 14px;
            color: #6b7280;
        }

        .pagination-buttons {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .page-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 34px;
            height: 34px;
            padding: 0 10px;
            border-radius: 10px;
            border: 1px solid #d1d5db;
            background: #ffffff;
            color: #374151;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .page-btn:hover {
            background: #f3f4f6;
        }

        .page-btn.active {
            background: #166534;
            border-color: #166534;
            color: #ffffff;
        }

        .page-btn.disabled {
            opacity: 0.45;
            pointer-events: none;
            cursor: not-allowed;
        }

        .empty-row {
            text-align: center;
            padding: 22px;
            color: #6b7280;
        }
    </style>

    <div class="panel-header">
        <div>
            <p class="eyebrow">Catálogo</p>
            <h2>Productos registrados</h2>
            <p class="muted">Actualiza precio, stock, proveedor, categoría e imagen.</p>
        </div>

        <a class="primary-button" href="{{ route('productos.create') }}">
            Agregar producto
        </a>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Categoría</th>
                    <th>Proveedor</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse($productos as $p)
                    <tr>
                        <td>
                            <strong>{{ $p->nombre }}</strong>
                            <br>
                            <span class="muted">{{ $p->codigo_barras }}</span>
                        </td>

                        <td>{{ $p->categoria->nombre ?? 'Sin categoría' }}</td>

                        <td>{{ $p->proveedor->nombre ?? 'Sin proveedor' }}</td>

                        <td>${{ number_format($p->precio, 2) }}</td>

                        <td>{{ $p->stock }}</td>

                        <td>
                            <span class="status-badge {{ $p->activo ? 'activo' : 'inactivo' }}">
                                {{ $p->activo ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>

                        <td>
                            <div class="row-actions">
                                <a class="mini-button" href="{{ route('productos.edit', $p) }}">
                                    Editar
                                </a>

                                <form method="POST" action="{{ route('productos.destroy', $p) }}">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="mini-button danger"
                                        onclick="return confirm('¿Desactivar producto?')"
                                    >
                                        Desactivar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="empty-row">
                            No hay productos registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($productos->hasPages())
        <div class="pagination-clean">
            <div class="pagination-info">
                Mostrando {{ $productos->firstItem() }} a {{ $productos->lastItem() }}
                de {{ $productos->total() }} productos
            </div>

            <div class="pagination-buttons">
                @if($productos->onFirstPage())
                    <span class="page-btn disabled">Anterior</span>
                @else
                    <a class="page-btn" href="{{ $productos->previousPageUrl() }}">
                        Anterior
                    </a>
                @endif

                @foreach($productos->getUrlRange(1, $productos->lastPage()) as $page => $url)
                    @if($page == $productos->currentPage())
                        <span class="page-btn active">{{ $page }}</span>
                    @else
                        <a class="page-btn" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach

                @if($productos->hasMorePages())
                    <a class="page-btn" href="{{ $productos->nextPageUrl() }}">
                        Siguiente
                    </a>
                @else
                    <span class="page-btn disabled">Siguiente</span>
                @endif
            </div>
        </div>
    @endif

</section>
@endsection