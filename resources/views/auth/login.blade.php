@extends('layouts.public')

@section('title', 'Iniciar sesión | La Casita')

@section('content')
<main class="auth-layout">
  <section class="auth-panel">
    <a class="brand" href="{{ route('home') }}">
      <img class="brand-logo" src="{{ asset('assets/img/logo-lacasita.jpeg') }}" alt="Logo La Casita">

      <span>
        <strong>La Casita</strong>
        <small>Tu súper de confianza</small>
      </span>
    </a>

    <h1>Iniciar sesión</h1>

    <p class="muted">
      Ingresa con tu cuenta. Laravel validará tu sesión y enviará cada usuario a su panel correspondiente.
    </p>

    @if(session('status'))
      <div class="alert-success auto-dismiss-alert">
        {{ session('status') }}
      </div>
    @endif

    @if($errors->any())
      <div class="alert-danger auto-dismiss-alert">
        <strong>No fue posible iniciar sesión:</strong>

        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form class="auth-form" method="POST" action="{{ route('login.store') }}" autocomplete="on">
      @csrf

      <label>
        Correo electrónico

        <input
          class="input"
          type="email"
          name="correo"
          value="{{ old('correo') }}"
          placeholder="correo@lacasita.com"
          autocomplete="email"
          required
          autofocus
        >
      </label>

      <label>
        Contraseña

        <input
          class="input"
          type="password"
          name="password"
          placeholder="Contraseña"
          autocomplete="current-password"
          required
        >
      </label>

      <label class="check-line">
        <input type="checkbox" name="remember" value="1">
        Mantener sesión en este navegador
      </label>

      <button class="primary-button full" type="submit">
        Entrar
      </button>
    </form>

    <p class="center-text">
      ¿No tienes cuenta?
      <a href="{{ route('register') }}">Crear cuenta de cliente</a>
    </p>
  </section>

  <section class="auth-visual">
    <div class="glass-card">
      <p class="eyebrow">Bienvenido a La Casita</p>
      <h2>Todo para tu despensa en un solo lugar</h2>
      <p>Catálogo, promociones y sucursales en una interfaz más segura y elegante.</p>
    </div>
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
@endsection