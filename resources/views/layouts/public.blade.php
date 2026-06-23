<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">

  <title>@yield('title', 'La Casita')</title>

  <link rel="icon" type="image/jpeg" href="{{ asset('assets/img/logo-lacasita.jpeg') }}">

<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}?v=railway-final-3">
<link rel="stylesheet" href="{{ asset('assets/css/laravel-pro.css') }}?v=railway-final-3">

<style>
  .brand-logo {
    width: 42px !important;
    height: 42px !important;
    max-width: 42px !important;
    max-height: 42px !important;
    border-radius: 14px !important;
    object-fit: cover !important;
    display: block !important;
  }

  .product-image {
    height: 178px !important;
    display: grid !important;
    place-items: center !important;
    overflow: hidden !important;
  }

  .product-image img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
  }

  .dashboard-shell {
    display: grid !important;
    grid-template-columns: 310px minmax(0, 1fr) !important;
  }

  .sidebar-app {
    height: 100vh !important;
    position: sticky !important;
    top: 0 !important;
  }
</style>
  
</head>

<body class="public-page">
  <header class="topbar public-topbar">
    <a class="brand" href="{{ route('home') }}">
      <img class="brand-logo" src="{{ asset('assets/img/logo-lacasita.jpeg') }}" alt="Logo La Casita">

      <span>
        <strong>La Casita</strong>
        <small>Mini súper y abarrotes</small>
      </span>
    </a>

    <nav class="public-nav open-on-desktop">
      <a href="{{ route('home') }}#catalogo">Catálogo</a>
      <a href="{{ route('home') }}#ofertas">Ofertas</a>
      <a href="{{ route('home') }}#sucursales">Sucursales</a>
      <a href="{{ route('home') }}#faq">Ayuda</a>
    </nav>

    <div class="top-actions">
      @auth
        <a class="ghost-button" href="{{ route('dashboard') }}">
          Mi panel
        </a>

        <form method="POST" action="{{ route('logout') }}">
          @csrf

          <button class="primary-button compact" type="submit">
            Salir
          </button>
        </form>
      @else
        <a class="ghost-button" href="{{ route('login') }}">
          Iniciar sesión
        </a>

        <a class="primary-button compact" href="{{ route('register') }}">
          Registrarme
        </a>
      @endauth
    </div>
  </header>

  @yield('content')

  <footer class="site-footer shell">
    <strong>La Casita:)</strong>
  </footer>
</body>
</html>
