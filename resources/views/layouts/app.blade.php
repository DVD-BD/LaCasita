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

  <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}?v=laravel-pro-ux4">
  <link rel="stylesheet" href="{{ asset('assets/css/laravel-pro.css') }}?v=laravel-pro-ux4">
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
      @endif

      @if(auth()->user()->rol === 'administrador')
        <span class="nav-section-label">Administración</span>

        <a href="{{ route('clientes.index') }}" class="{{ request()->routeIs('clientes.*') ? 'active' : '' }}">
          <span>👥</span> Clientes
        </a>

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