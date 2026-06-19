@extends('layouts.app')

@section('title','Catálogo | Cliente')
@section('eyebrow','Cliente')
@section('heading','Catálogo disponible')

@section('content')

<style>
    .alert-client {
        margin-bottom: 18px;
        padding: 14px 18px;
        border-radius: 16px;
        font-weight: 700;
    }

    .alert-client.success {
        background: #dcfce7;
        color: #166534;
        border: 1px solid #86efac;
    }

    .alert-client.error {
        background: #fee2e2;
        color: #991b1b;
        border: 1px solid #fca5a5;
    }

    .buy-form {
        margin-top: 18px;
    }

    .btn-comprar {
        width: 100%;
        padding: 13px 18px;
        border: none;
        border-radius: 16px;
        background: linear-gradient(135deg, #22c55e, #16a34a);
        color: #ffffff;
        font-size: 15px;
        font-weight: 800;
        cursor: pointer;
        box-shadow: 0 12px 28px rgba(34, 197, 94, 0.25);
        transition: all 0.2s ease;
    }

    .btn-comprar:hover {
        transform: translateY(-2px);
        box-shadow: 0 16px 34px rgba(34, 197, 94, 0.35);
    }

    .btn-sin-stock {
        width: 100%;
        margin-top: 18px;
        padding: 13px 18px;
        border: none;
        border-radius: 16px;
        background: #64748b;
        color: #ffffff;
        font-size: 15px;
        font-weight: 800;
        cursor: not-allowed;
        box-shadow: none;
    }
</style>

@if(session('success'))
    <div class="alert-client success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert-client error">
        {{ session('error') }}
    </div>
@endif

<div class="product-grid">
    @foreach($productos as $producto)
        <article class="product-card">
            <div class="product-image">
                <img src="{{ asset('assets/img/'.$producto->imagen) }}" alt="{{ $producto->nombre }}">
            </div>

            <div class="product-content">
                <span class="stock-badge">
                    {{ $producto->categoria->nombre ?? 'Categoría' }}
                </span>

                <h3>{{ $producto->nombre }}</h3>

                <p class="muted">
                    {{ $producto->descripcion }}
                </p>

                <div class="product-meta">
                    <span class="price">
                        ${{ number_format($producto->precio, 2) }}
                    </span>

                    <span>
                        Stock {{ $producto->stock }}
                    </span>
                </div>

                @if($producto->stock > 0)
                    <form action="{{ route('cliente.compras.store', $producto->getKey()) }}" method="POST" class="buy-form">
                        @csrf

                        <button type="submit" class="btn-comprar">
                            Comprar
                        </button>
                    </form>
                @else
                    <button class="btn-sin-stock" disabled>
                        Sin stock
                    </button>
                @endif
            </div>
        </article>
    @endforeach
</div>

@endsection