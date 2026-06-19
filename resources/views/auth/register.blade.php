@extends('layouts.public')

@section('title', 'Registro | La Casita')

@section('content')
<main class="auth-layout reverse">
  <section class="auth-panel">
    <a class="brand" href="{{ route('home') }}">
      <img class="brand-logo" src="{{ asset('assets/img/logo-lacasita.jpeg') }}" alt="Logo La Casita">

      <span>
        <strong>La Casita</strong>
        <small>Únete a la comunidad</small>
      </span>
    </a>

    <h1>Registro de cliente</h1>

    <p class="muted">
      Crea tu cuenta para guardar tus datos y consultar tus compras.
    </p>

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

    <form class="auth-form" method="POST" action="{{ route('register.store') }}" autocomplete="on">
      @csrf

      <label>
        Nombre completo
        <input
          class="input"
          type="text"
          name="nombre"
          value="{{ old('nombre') }}"
          placeholder="Tu nombre completo"
          maxlength="120"
          required
          autofocus
        >
      </label>

      <label>
        Teléfono
        <input
          class="input"
          type="text"
          name="telefono"
          value="{{ old('telefono') }}"
          placeholder="55 0000 0000"
          maxlength="30"
          required
        >
      </label>

      <label>
        Correo electrónico
        <input
          class="input"
          type="email"
          name="correo"
          value="{{ old('correo') }}"
          placeholder="correo@ejemplo.com"
          maxlength="150"
          autocomplete="email"
          required
        >
      </label>

      <label>
        Ciudad
        <input
          class="input"
          type="text"
          name="ciudad"
          value="{{ old('ciudad') }}"
          placeholder="Ciudad"
          maxlength="80"
          required
        >
      </label>

      <label>
        Código postal
        <input
          class="input"
          type="text"
          name="codigo_postal"
          value="{{ old('codigo_postal') }}"
          placeholder="Opcional"
          maxlength="12"
        >
      </label>

      <label>
        Dirección
        <input
          class="input"
          type="text"
          name="direccion"
          value="{{ old('direccion') }}"
          placeholder="Calle, número y colonia"
          maxlength="255"
          required
        >
      </label>

      <label>
        Contraseña
        <input
          class="input"
          type="password"
          name="password"
          placeholder="Mínimo 6 caracteres"
          minlength="6"
          autocomplete="new-password"
          required
        >
      </label>

      <label>
        Confirmar contraseña
        <input
          class="input"
          type="password"
          name="password_confirmation"
          placeholder="Repite tu contraseña"
          minlength="6"
          autocomplete="new-password"
          required
        >
      </label>

      <button class="primary-button full" type="submit">
        Crear cuenta
      </button>
    </form>

    <p class="center-text">
      ¿Ya tienes cuenta?
      <a href="{{ route('login') }}">Iniciar sesión</a>
    </p>
  </section>

  <section class="auth-visual register-visual">
    <div class="glass-card">
      <p class="eyebrow">Regístrate en La Casita</p>
      <h2>Ofertas, productos y sucursales cerca de ti</h2>
      <p>Tu cuenta de cliente queda protegida por sesión de Laravel.</p>
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