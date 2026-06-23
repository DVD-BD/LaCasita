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
  :root {
    --dark-bg: #050816;
    --dark-bg-2: #0b1020;
    --dark-card: rgba(15, 23, 42, 0.92);
    --dark-card-2: rgba(30, 41, 59, 0.92);
    --dark-border: rgba(148, 163, 184, 0.18);
    --dark-text: #f8fafc;
    --dark-muted: #cbd5e1;
    --dark-soft: #94a3b8;
    --cyan: #38bdf8;
    --cyan-2: #0ea5e9;
    --yellow: #facc15;
    --danger: #ef4444;
  }

  * {
    box-sizing: border-box !important;
  }

  html,
  body {
    margin: 0 !important;
    min-height: 100% !important;
    background:
      radial-gradient(circle at top left, rgba(56, 189, 248, 0.20), transparent 32%),
      radial-gradient(circle at top right, rgba(250, 204, 21, 0.13), transparent 28%),
      linear-gradient(180deg, var(--dark-bg), var(--dark-bg-2) 55%, #030712) !important;
    color: var(--dark-text) !important;
    font-family: Inter, Segoe UI, Roboto, Arial, sans-serif !important;
  }

  body,
  p,
  span,
  td,
  th,
  label,
  input,
  select,
  textarea,
  button,
  a {
    font-size: 15px;
  }

  a {
    color: inherit !important;
    text-decoration: none !important;
  }

  h1,
  h2,
  h3,
  h4 {
    color: var(--dark-text) !important;
    font-weight: 900 !important;
    letter-spacing: -0.035em !important;
    line-height: 1.08 !important;
  }

  p {
    color: var(--dark-muted) !important;
  }

  .muted,
  small {
    color: var(--dark-soft) !important;
  }

  /* =========================
     NAV PÚBLICO / INICIO
  ========================= */

  .public-page {
    min-height: 100vh !important;
    background:
      radial-gradient(circle at 8% 8%, rgba(56, 189, 248, 0.18), transparent 30%),
      radial-gradient(circle at 90% 10%, rgba(250, 204, 21, 0.12), transparent 28%),
      linear-gradient(180deg, #050816, #0b1020 55%, #030712) !important;
    color: var(--dark-text) !important;
  }

  .topbar,
  .public-topbar {
    width: 100% !important;
    min-height: 78px !important;
    padding: 14px 6vw !important;
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    gap: 22px !important;
    background: rgba(2, 6, 23, 0.86) !important;
    border-bottom: 1px solid var(--dark-border) !important;
    box-shadow: 0 18px 45px rgba(0, 0, 0, 0.35) !important;
    backdrop-filter: blur(18px) !important;
    position: sticky !important;
    top: 0 !important;
    z-index: 100 !important;
  }

  .brand,
  .app-brand {
    display: flex !important;
    align-items: center !important;
    gap: 12px !important;
    color: var(--dark-text) !important;
    min-width: max-content !important;
  }

  .brand span,
  .app-brand span {
    display: flex !important;
    flex-direction: column !important;
    gap: 2px !important;
    line-height: 1.05 !important;
  }

  .brand strong,
  .app-brand strong {
    color: var(--dark-text) !important;
    font-size: 1.15rem !important;
    font-weight: 900 !important;
  }

  .brand small,
  .app-brand small {
    color: var(--dark-soft) !important;
    font-size: 0.78rem !important;
    font-weight: 700 !important;
  }

  .brand-logo {
    width: 42px !important;
    height: 42px !important;
    min-width: 42px !important;
    max-width: 42px !important;
    max-height: 42px !important;
    border-radius: 14px !important;
    object-fit: cover !important;
    display: block !important;
    box-shadow: 0 10px 25px rgba(56, 189, 248, 0.22) !important;
  }

  .public-nav,
  .open-on-desktop {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 10px !important;
    flex-wrap: wrap !important;
  }

  .public-nav a {
    color: var(--dark-muted) !important;
    font-weight: 800 !important;
    font-size: 0.95rem !important;
    padding: 10px 13px !important;
    border-radius: 999px !important;
    transition: 0.2s ease !important;
  }

  .public-nav a:hover,
  .public-nav a.active {
    background: rgba(56, 189, 248, 0.16) !important;
    color: var(--cyan) !important;
  }

  .top-actions {
    display: flex !important;
    align-items: center !important;
    justify-content: flex-end !important;
    gap: 10px !important;
    flex-wrap: wrap !important;
  }

  .ghost-button,
  .primary-button,
  .primary-button.compact {
    min-height: 42px !important;
    padding: 10px 16px !important;
    border-radius: 999px !important;
    font-weight: 900 !important;
    font-size: 0.9rem !important;
    cursor: pointer !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    border: none !important;
  }

  .ghost-button {
    background: rgba(148, 163, 184, 0.12) !important;
    color: var(--dark-text) !important;
    border: 1px solid var(--dark-border) !important;
  }

  .primary-button,
  .primary-button.compact,
  .btn-comprar {
    background: linear-gradient(135deg, var(--cyan), var(--cyan-2)) !important;
    color: #ffffff !important;
    box-shadow: 0 14px 30px rgba(14, 165, 233, 0.30) !important;
  }

  /* =========================
     LAYOUT INTERNO
  ========================= */

  .dashboard-shell {
    display: grid !important;
    grid-template-columns: 310px minmax(0, 1fr) !important;
    min-height: 100vh !important;
    background:
      radial-gradient(circle at 4% 4%, rgba(56, 189, 248, 0.18), transparent 30%),
      radial-gradient(circle at 95% 15%, rgba(250, 204, 21, 0.11), transparent 28%),
      linear-gradient(180deg, #050816, #0b1020 55%, #030712) !important;
  }

  .sidebar-app {
    width: 310px !important;
    height: 100vh !important;
    position: sticky !important;
    top: 0 !important;
    background: rgba(2, 6, 23, 0.94) !important;
    color: var(--dark-text) !important;
    padding: 18px !important;
    display: flex !important;
    flex-direction: column !important;
    gap: 1rem !important;
    border-right: 1px solid var(--dark-border) !important;
    box-shadow: 12px 0 45px rgba(0, 0, 0, 0.35) !important;
    z-index: 25 !important;
  }

  .sidebar-profile-card {
    display: flex !important;
    align-items: center !important;
    gap: 12px !important;
    padding: 14px !important;
    border-radius: 22px !important;
    background: rgba(15, 23, 42, 0.88) !important;
    border: 1px solid var(--dark-border) !important;
    margin: 10px 0 8px !important;
  }

  .sidebar-profile-card strong {
    color: var(--dark-text) !important;
    font-weight: 900 !important;
    display: block !important;
  }

  .sidebar-profile-card span {
    color: var(--dark-soft) !important;
    font-size: 0.88rem !important;
  }

  .avatar,
  .avatar-xl {
    width: 42px !important;
    height: 42px !important;
    min-width: 42px !important;
    border-radius: 50% !important;
    background: linear-gradient(135deg, var(--cyan), var(--cyan-2)) !important;
    color: #ffffff !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    font-weight: 900 !important;
    text-transform: uppercase !important;
  }

  .side-nav,
  .side-nav-pro {
    display: flex !important;
    flex-direction: column !important;
    gap: 7px !important;
    margin-top: 12px !important;
  }

  .nav-section-label {
    display: block !important;
    color: var(--dark-soft) !important;
    font-size: 0.72rem !important;
    font-weight: 900 !important;
    letter-spacing: 0.12em !important;
    text-transform: uppercase !important;
    margin: 16px 8px 6px !important;
  }

  .side-nav a,
  .side-nav-pro a {
    width: 100% !important;
    min-height: 44px !important;
    display: flex !important;
    align-items: center !important;
    gap: 10px !important;
    padding: 11px 13px !important;
    border-radius: 16px !important;
    color: var(--dark-muted) !important;
    font-weight: 800 !important;
    font-size: 0.95rem !important;
    background: transparent !important;
    transition: 0.2s ease !important;
  }

  .side-nav a span,
  .side-nav-pro a span {
    width: 22px !important;
    min-width: 22px !important;
    display: inline-flex !important;
    justify-content: center !important;
  }

  .side-nav a:hover,
  .side-nav a.active,
  .side-nav-pro a:hover,
  .side-nav-pro a.active {
    background: rgba(56, 189, 248, 0.17) !important;
    color: #ffffff !important;
    box-shadow: inset 3px 0 0 var(--cyan) !important;
  }

  .app-main,
  .app-main-pro {
    min-width: 0 !important;
    padding: 1.4rem !important;
    background: transparent !important;
    color: var(--dark-text) !important;
  }

  .app-header,
  .app-header-pro,
  .page-header {
    background: rgba(15, 23, 42, 0.88) !important;
    color: var(--dark-text) !important;
    border: 1px solid var(--dark-border) !important;
    border-radius: 28px !important;
    padding: 1.2rem 1.4rem !important;
    margin-bottom: 1.2rem !important;
    box-shadow: 0 24px 55px rgba(0, 0, 0, 0.26) !important;
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
    gap: 16px !important;
    flex-wrap: wrap !important;
  }

  .eyebrow {
    margin: 0 0 4px !important;
    color: var(--cyan) !important;
    font-weight: 900 !important;
    letter-spacing: 0.12em !important;
    text-transform: uppercase !important;
    font-size: 0.75rem !important;
  }

  .app-header h1,
  .app-header-pro h1,
  .page-header h1 {
    margin: 0 !important;
    color: var(--dark-text) !important;
    font-size: clamp(1.7rem, 3vw, 2.7rem) !important;
  }

  .header-actions,
  .header-actions-pro {
    display: flex !important;
    align-items: center !important;
    justify-content: flex-end !important;
    gap: 10px !important;
    flex-wrap: wrap !important;
  }

  .header-date,
  .user-pill {
    background: rgba(148, 163, 184, 0.13) !important;
    color: var(--dark-text) !important;
    border: 1px solid var(--dark-border) !important;
    border-radius: 999px !important;
    padding: 9px 13px !important;
    font-weight: 800 !important;
    display: inline-flex !important;
    align-items: center !important;
    gap: 8px !important;
  }

  /* =========================
     CARDS / PANELES
  ========================= */

  .panel-card,
  .stat-card,
  .info-card,
  .branch-card,
  .promo-card,
  .product-card,
  .form-card,
  .auth-card {
    background: rgba(15, 23, 42, 0.90) !important;
    color: var(--dark-text) !important;
    border: 1px solid var(--dark-border) !important;
    border-radius: 26px !important;
    box-shadow: 0 22px 55px rgba(0, 0, 0, 0.30) !important;
  }

  .panel-card {
    padding: 1.35rem !important;
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
    padding: 1.25rem !important;
  }

  .stat-card strong {
    font-size: 2rem !important;
    color: var(--dark-text) !important;
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

  /* =========================
     PRODUCTOS
  ========================= */

  .product-grid {
    display: grid !important;
    grid-template-columns: repeat(auto-fit, minmax(230px, 1fr)) !important;
    gap: 22px !important;
  }

  .product-card {
    overflow: hidden !important;
    display: flex !important;
    flex-direction: column !important;
  }

  .product-image {
    width: 100% !important;
    height: 190px !important;
    background: rgba(15, 23, 42, 0.85) !important;
    display: block !important;
    overflow: hidden !important;
  }

  .product-image img,
  .product-card img {
    width: 100% !important;
    height: 100% !important;
    max-width: 100% !important;
    max-height: 190px !important;
    object-fit: cover !important;
    display: block !important;
  }

  .product-content {
    padding: 1.15rem !important;
    display: flex !important;
    flex-direction: column !important;
    gap: 0.75rem !important;
  }

  .product-content h3 {
    color: var(--dark-text) !important;
    font-size: 1.1rem !important;
    font-weight: 900 !important;
  }

  .product-meta {
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    gap: 0.8rem !important;
    color: var(--dark-soft) !important;
    font-weight: 700 !important;
  }

  .price {
    color: var(--yellow) !important;
    font-weight: 900 !important;
    font-size: 1.15rem !important;
  }

  /* =========================
     TABLAS / FORMULARIOS
  ========================= */

  .table-wrap {
    overflow: auto !important;
    border: 1px solid var(--dark-border) !important;
    border-radius: 22px !important;
    background: rgba(15, 23, 42, 0.92) !important;
  }

  table {
    width: 100% !important;
    border-collapse: collapse !important;
    color: var(--dark-text) !important;
  }

  th {
    background: rgba(30, 41, 59, 0.95) !important;
    color: var(--dark-muted) !important;
    font-weight: 900 !important;
    text-align: left !important;
    padding: 0.9rem 1rem !important;
    white-space: nowrap !important;
  }

  td {
    padding: 0.9rem 1rem !important;
    border-top: 1px solid var(--dark-border) !important;
    color: var(--dark-text) !important;
    vertical-align: middle !important;
  }

  input,
  select,
  textarea,
  .input {
    width: 100% !important;
    border: 1px solid var(--dark-border) !important;
    background: rgba(2, 6, 23, 0.80) !important;
    color: var(--dark-text) !important;
    border-radius: 14px !important;
    padding: 0.85rem 1rem !important;
    outline: none !important;
  }

  input::placeholder,
  textarea::placeholder {
    color: var(--dark-soft) !important;
  }

  .mini-button {
    background: rgba(56, 189, 248, 0.15) !important;
    color: var(--cyan) !important;
    border: 1px solid rgba(56, 189, 248, 0.22) !important;
    padding: 0.55rem 0.8rem !important;
    border-radius: 14px !important;
    font-weight: 900 !important;
  }

  .mini-button.danger {
    background: rgba(239, 68, 68, 0.13) !important;
    color: #fca5a5 !important;
    border-color: rgba(239, 68, 68, 0.24) !important;
  }

  .row-actions {
    display: flex !important;
    gap: 0.5rem !important;
    flex-wrap: wrap !important;
  }

  .stock-badge,
  .status-badge {
    display: inline-flex !important;
    align-items: center !important;
    width: fit-content !important;
    border-radius: 999px !important;
    padding: 0.35rem 0.65rem !important;
    background: rgba(56, 189, 248, 0.15) !important;
    color: var(--cyan) !important;
    font-weight: 900 !important;
    font-size: 0.78rem !important;
  }

  /* =========================
     RESPONSIVE
  ========================= */

  @media (max-width: 980px) {
    .dashboard-shell {
      display: block !important;
    }

    .sidebar-app {
      width: 100% !important;
      height: auto !important;
      position: relative !important;
    }

    .stats-grid {
      grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
    }
  }

  @media (max-width: 700px) {
    .topbar,
    .public-topbar {
      align-items: flex-start !important;
      flex-direction: column !important;
      padding: 14px 18px !important;
    }

    .public-nav,
    .top-actions {
      justify-content: flex-start !important;
    }

    .product-grid,
    .stats-grid,
    .dashboard-actions {
      grid-template-columns: 1fr !important;
    }

    .app-main,
    .app-main-pro {
      padding: 0.9rem !important;
    }
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
