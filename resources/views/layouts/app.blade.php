<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">

  <title>@yield('title', 'Panel | La Casita')</title>

  <link rel="icon" type="image/jpeg" href="{{ asset('assets/img/logo-lacasita.jpeg') }}">

<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}?v=railway-final-3">
<link rel="stylesheet" href="{{ asset('assets/css/laravel-pro.css') }}?v=railway-final-3">
<style>
  body {
    font-family: Inter, Segoe UI, Roboto, Arial, sans-serif !important;
  }

  h1, h2, h3, h4 {
    font-weight: 900 !important;
    letter-spacing: -0.03em !important;
    line-height: 1.08 !important;
  }

  p, span, td, th, label, input, select, textarea, button, a {
    font-size: 15px;
  }

  .brand-logo {
    width: 42px !important;
    height: 42px !important;
    max-width: 42px !important;
    max-height: 42px !important;
    border-radius: 14px !important;
    object-fit: cover !important;
    display: block !important;
  }

  .dashboard-shell {
    display: grid !important;
    grid-template-columns: 310px minmax(0, 1fr) !important;
    min-height: 100vh !important;
    background:
      radial-gradient(circle at 4% 4%, rgba(56,189,248,.22), transparent 28%),
      radial-gradient(circle at 96% 16%, rgba(251,191,36,.16), transparent 26%),
      linear-gradient(180deg, #060a14, #0b1220 45%, #070b16) !important;
  }

  .sidebar-app {
    height: 100vh !important;
    position: sticky !important;
    top: 0 !important;
    background: rgba(15, 23, 42, 0.96) !important;
    color: #ffffff !important;
    padding: 1.1rem !important;
    display: flex !important;
    flex-direction: column !important;
    gap: 1rem !important;
    box-shadow: 8px 0 30px rgba(15,23,42,.25) !important;
    z-index: 25 !important;
  }

  .app-main,
  .app-main-pro {
    min-width: 0 !important;
    padding: 1.4rem !important;
    background: transparent !important;
  }

  .page-header,
  .app-header {
    background: rgba(255,255,255,.92) !important;
    color: #0f172a !important;
    border-radius: 28px !important;
    padding: 1.2rem 1.4rem !important;
    margin-bottom: 1.2rem !important;
    box-shadow: 0 20px 45px rgba(0,0,0,.18) !important;
  }

  .panel-card {
    background: rgba(255,255,255,.96) !important;
    color: #0f172a !important;
    border: 1px solid rgba(226,232,240,.9) !important;
    border-radius: 28px !important;
    padding: 1.35rem !important;
    box-shadow: 0 24px 55px rgba(0,0,0,.20) !important;
  }

  .panel-card .muted,
  .info-card .muted,
  .stat-card small {
    color: #64748b !important;
  }

  .stats-grid {
    display: grid !important;
    grid-template-columns: repeat(4, minmax(0, 1fr)) !important;
    gap: 18px !important;
    margin-bottom: 1.2rem !important;
  }

  .stat-card,
  .info-card,
  .branch-card,
  .promo-card {
    background: rgba(255,255,255,.96) !important;
    color: #0f172a !important;
    border: 1px solid rgba(226,232,240,.9) !important;
    border-radius: 24px !important;
    padding: 1.25rem !important;
    box-shadow: 0 18px 42px rgba(0,0,0,.16) !important;
  }

  .stat-card strong {
    font-size: 2rem !important;
    color: #0f172a !important;
  }

  .dashboard-actions {
    display: grid !important;
    grid-template-columns: repeat(auto-fit, minmax(190px, 1fr)) !important;
    gap: 18px !important;
  }

  .dashboard-actions .info-card {
    min-height: 135px !important;
    display: grid !important;
    align-content: end !important;
    font-weight: 900 !important;
    font-size: 1.05rem !important;
  }

  .product-grid {
    display: grid !important;
    grid-template-columns: repeat(auto-fit, minmax(230px, 1fr)) !important;
    gap: 22px !important;
  }

  .product-card {
    background: rgba(255,255,255,.96) !important;
    color: #0f172a !important;
    border: 1px solid rgba(226,232,240,.9) !important;
    border-radius: 26px !important;
    overflow: hidden !important;
    box-shadow: 0 20px 45px rgba(0,0,0,.16) !important;
    display: flex !important;
    flex-direction: column !important;
  }

  .product-image {
    width: 100% !important;
    height: 190px !important;
    background: #eef3ff !important;
    display: block !important;
    overflow: hidden !important;
  }

  .product-image img {
    width: 100% !important;
    height: 100% !important;
    max-width: 100% !important;
    max-height: 100% !important;
    object-fit: cover !important;
    display: block !important;
  }

  .product-content {
    padding: 1.15rem !important;
    display: flex !important;
    flex-direction: column !important;
    gap: .75rem !important;
  }

  .product-content h3 {
    color: #0f172a !important;
    font-size: 1.1rem !important;
    font-weight: 900 !important;
  }

  .product-meta {
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    gap: .8rem !important;
    color: #64748b !important;
    font-weight: 700 !important;
  }

  .price {
    color: #0ea5e9 !important;
    font-weight: 900 !important;
    font-size: 1.15rem !important;
  }

  .table-wrap {
    overflow: auto !important;
    border: 1px solid rgba(226,232,240,.9) !important;
    border-radius: 22px !important;
    background: #ffffff !important;
  }

  table {
    width: 100% !important;
    border-collapse: collapse !important;
    color: #0f172a !important;
  }

  th {
    background: #f1f5f9 !important;
    color: #334155 !important;
    font-weight: 900 !important;
    text-align: left !important;
    padding: .9rem 1rem !important;
    white-space: nowrap !important;
  }

  td {
    padding: .9rem 1rem !important;
    border-top: 1px solid #e2e8f0 !important;
    color: #0f172a !important;
    vertical-align: middle !important;
  }

  .input,
  input,
  select,
  textarea {
    width: 100% !important;
    border: 1px solid #cbd5e1 !important;
    background: #ffffff !important;
    color: #0f172a !important;
    border-radius: 14px !important;
    padding: .85rem 1rem !important;
    outline: none !important;
  }

  .primary-button,
  .mini-button,
  .btn-comprar {
    border: none !important;
    border-radius: 14px !important;
    font-weight: 900 !important;
    text-align: center !important;
    display: inline-flex !important;
    justify-content: center !important;
    align-items: center !important;
    gap: .45rem !important;
  }

  .primary-button,
  .btn-comprar {
    background: linear-gradient(135deg, #38bdf8, #0ea5e9) !important;
    color: #ffffff !important;
    box-shadow: 0 12px 25px rgba(14,165,233,.28) !important;
  }

  .mini-button {
    background: #e0f2fe !important;
    color: #0369a1 !important;
    padding: .55rem .8rem !important;
  }

  .mini-button.danger {
    background: #fee2e2 !important;
    color: #b91c1c !important;
  }

  .row-actions {
    display: flex !important;
    gap: .5rem !important;
    flex-wrap: wrap !important;
  }

  .stock-badge,
  .status-badge {
    display: inline-flex !important;
    align-items: center !important;
    width: fit-content !important;
    border-radius: 999px !important;
    padding: .35rem .65rem !important;
    background: #e0f2fe !important;
    color: #0369a1 !important;
    font-weight: 900 !important;
    font-size: .78rem !important;
  }

  @media (max-width: 980px) {
    .dashboard-shell {
      display: block !important;
    }

    .sidebar-app {
      height: auto !important;
      position: relative !important;
    }

    .stats-grid {
      grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
    }
  }

  @media (max-width: 620px) {
    .product-grid,
    .stats-grid,
    .dashboard-actions {
      grid-template-columns: 1fr !important;
    }

    .app-main,
    .app-main-pro {
      padding: .9rem !important;
    }
  }
</style>
  
</head>

<body class="dashboard-page dashboard-shell">
  <aside class="sidebar-app sidebar-pro">
    <a class="brand app-brand" href="{{ route('dashboard') }}">
      <img class="brand-logo" src="{{ asset('assets/img/logo-lacasita.jpeg') }}" alt="Logo La Casita">

      <span>
        <strong>La Casita</strong>
        <small>Mini súper digital</small>
      </span>
    </a>

    <div class="sidebar-profile-card">
      <span class="avatar avatar-xl">
        {{ mb_substr(auth()->user()->nombre, 0, 1) }}
      </span>

      <div>
        <strong>{{ auth()->user()->nombre }}</strong>
        <span>{{ ucfirst(auth()->user()->rol) }}</span>
      </div>
    </div>

    <nav class="side-nav side-nav-pro">
      <span class="nav-section-label">Inicio</span>

      <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <span>📊</span> Resumen
      </a>

      @if(auth()->user()->rol !== 'cliente')
        <span class="nav-section-label">Operación</span>

        <a href="{{ route('productos.index') }}" class="{{ request()->routeIs('productos.*') ? 'active' : '' }}">
          <span>🛒</span> Productos
        </a>

        <a href="{{ route('inventario.index') }}" class="{{ request()->routeIs('inventario.*') ? 'active' : '' }}">
          <span>📦</span> Inventario
        </a>

        <a href="{{ route('ventas.index') }}" class="{{ request()->routeIs('ventas.*') ? 'active' : '' }}">
          <span>💳</span> Ventas
        </a>
      
        <a href="{{ route('clientes.index') }}" class="{{ request()->routeIs('clientes.*') ? 'active' : '' }}">
        <span>👥</span> Clientes
        </a>
      @endif

      @if(auth()->user()->rol === 'administrador')
        <span class="nav-section-label">Administración</span>


        <a href="{{ route('empleados.index') }}" class="{{ request()->routeIs('empleados.*') ? 'active' : '' }}">
          <span>🧑‍💼</span> Empleados
        </a>

        <a href="{{ route('proveedores.index') }}" class="{{ request()->routeIs('proveedores.*') ? 'active' : '' }}">
          <span>🚚</span> Proveedores
        </a>

        <a href="{{ route('sucursales.index') }}" class="{{ request()->routeIs('sucursales.*') ? 'active' : '' }}">
          <span>📍</span> Sucursales
        </a>

        <a href="{{ route('categorias.index') }}" class="{{ request()->routeIs('categorias.*') ? 'active' : '' }}">
          <span>🏷️</span> Categorías
        </a>

        <a href="{{ route('promociones.index') }}" class="{{ request()->routeIs('promociones.*') ? 'active' : '' }}">
          <span>🔥</span> Promociones
        </a>

        <a href="{{ route('faqs.index') }}" class="{{ request()->routeIs('faqs.*') ? 'active' : '' }}">
          <span>❓</span> FAQ
        </a>
      @endif

      @if(auth()->user()->rol === 'cliente')
        <span class="nav-section-label">Cliente</span>

        <a href="{{ route('cliente.catalogo') }}" class="{{ request()->routeIs('cliente.catalogo') ? 'active' : '' }}">
          <span>🛍️</span> Catálogo
        </a>

        <a href="{{ route('cliente.compras') }}" class="{{ request()->routeIs('cliente.compras') ? 'active' : '' }}">
          <span>🧾</span> Mis compras
        </a>
      @endif
    </nav>
  </aside>

  <main class="app-main app-main-pro">
    <header class="app-header app-header-pro">
      <div>
        <p class="eyebrow">@yield('eyebrow', 'Panel')</p>
        <h1>@yield('heading', 'La Casita')</h1>
      </div>

      <div class="header-actions header-actions-pro">
        <span class="header-date">{{ now()->format('d/m/Y') }}</span>

        <span class="user-pill">
          <span class="avatar">
            {{ mb_substr(auth()->user()->nombre, 0, 1) }}
          </span>
          <span>{{ auth()->user()->nombre }}</span>
        </span>

        <form method="POST" action="{{ route('logout') }}">
          @csrf

          <button class="ghost-button" type="submit">
            Cerrar sesión
          </button>
        </form>
      </div>
    </header>

    <section class="content-area content-area-pro">
      @if(session('status'))
        <div class="alert-success auto-dismiss-alert">
          {{ session('status') }}
        </div>
      @endif

      @if($errors->any())
        <div class="alert-danger auto-dismiss-alert">
          <strong>Revisa los datos:</strong>

          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @yield('content')
    </section>
  </main>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const alerts = document.querySelectorAll('.auto-dismiss-alert');

      alerts.forEach(function (alert) {
        setTimeout(function () {
          alert.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
          alert.style.opacity = '0';
          alert.style.transform = 'translateY(-6px)';

          setTimeout(function () {
            alert.remove();
          }, 450);
        }, 5000);
      });
    });
  </script>
</body>
</html>
