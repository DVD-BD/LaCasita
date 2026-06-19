@extends('layouts.app')

@section('title', 'Inventario | La Casita')
@section('eyebrow', 'Operación')
@section('heading', 'Inventario por sucursal')

@section('content')
<section class="panel-card inventory-panel">

    <style>
        .inventory-summary {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 2px;
        }

        .inventory-summary strong {
            font-size: 28px;
            line-height: 1;
        }

        .inventory-summary span {
            color: #6b7280;
            font-size: 14px;
        }

        .inventory-legend {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 16px;
            color: #6b7280;
            font-size: 14px;
        }

        .inventory-legend span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 999px;
            display: inline-block;
        }

        .dot.ok {
            background: #16a34a;
        }

        .dot.warn {
            background: #f59e0b;
        }

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

    @php
        $esPaginado = method_exists($inventario, 'total');
        $totalRegistros = $esPaginado ? $inventario->total() : $inventario->count();
    @endphp

    <div class="panel-header">
        <div>
            <p class="eyebrow">Control de existencias</p>
            <h2>Lista de inventario</h2>
            <p class="muted">
                Consulta el stock disponible por producto y sucursal.
            </p>
        </div>

        <div class="inventory-summary">
            <strong>{{ $totalRegistros }}</strong>
            <span>registros de inventario</span>
        </div>
    </div>

    <div class="inventory-legend">
        <span><i class="dot ok"></i> Stock correcto</span>
        <span><i class="dot warn"></i> Stock bajo</span>
    </div>

    <div class="table-wrap pro-table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Sucursal</th>
                    <th>Stock</th>
                    <th>Mínimo</th>
                    <th>Estado</th>
                </tr>
            </thead>

            <tbody>
                @forelse($inventario as $i)
                    <tr>
                        <td>
                            <strong>{{ $i->producto->nombre ?? 'Producto' }}</strong>
                            <br>
                            <span class="muted">
                                {{ $i->producto->categoria->nombre ?? 'Sin categoría' }}
                            </span>
                        </td>

                        <td>{{ $i->sucursal->nombre ?? 'Sucursal' }}</td>

                        <td>
                            <strong>{{ $i->stock }}</strong>
                        </td>

                        <td>{{ $i->stock_minimo }}</td>

                        <td>
                            @if($i->stock <= $i->stock_minimo)
                                <span class="status-badge pendiente">Stock bajo</span>
                            @else
                                <span class="status-badge activo">Correcto</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty-row">
                            No hay registros de inventario.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($esPaginado && $inventario->hasPages())
        <div class="pagination-clean">
            <div class="pagination-info">
                Mostrando {{ $inventario->firstItem() }} a {{ $inventario->lastItem() }}
                de {{ $inventario->total() }} registros
            </div>

            <div class="pagination-buttons">
                @if($inventario->onFirstPage())
                    <span class="page-btn disabled">Anterior</span>
                @else
                    <a class="page-btn" href="{{ $inventario->previousPageUrl() }}">
                        Anterior
                    </a>
                @endif

                @foreach($inventario->getUrlRange(1, $inventario->lastPage()) as $page => $url)
                    @if($page == $inventario->currentPage())
                        <span class="page-btn active">{{ $page }}</span>
                    @else
                        <a class="page-btn" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach

                @if($inventario->hasMorePages())
                    <a class="page-btn" href="{{ $inventario->nextPageUrl() }}">
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