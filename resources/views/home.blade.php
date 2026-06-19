@extends('layouts.public')

@section('title', 'La Casita | Mini súper')

@section('content')
<main>

  <style>
    .home-hero-pro {
      min-height: calc(100vh - 86px);
      display: grid;
      grid-template-columns: minmax(0, 1fr) minmax(360px, 560px);
      gap: clamp(2rem, 5vw, 5rem);
      align-items: center;
      padding: clamp(3rem, 7vw, 6rem) clamp(1.4rem, 6vw, 7rem);
      background:
        radial-gradient(circle at 18% 12%, rgba(56,189,248,.18), transparent 32%),
        radial-gradient(circle at 90% 20%, rgba(251,191,36,.12), transparent 30%),
        linear-gradient(135deg, #07111f, #0d1b27 55%, #101827);
    }

    .hero-copy-pro {
      max-width: 760px;
    }

    .hero-copy-pro h1 {
      margin: .8rem 0 1.3rem;
      color: #f8fafc;
      font-size: clamp(2.8rem, 5.5vw, 5.7rem);
      line-height: 1;
      letter-spacing: -.07em;
    }

    .hero-copy-pro p {
      max-width: 650px;
      color: #b6c5d8;
      font-size: 1.08rem;
      line-height: 1.8;
    }

    .hero-actions-pro {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
      margin-top: 2rem;
    }

    .hero-trust-row {
      display: flex;
      gap: .8rem;
      flex-wrap: wrap;
      margin-top: 2rem;
    }

    .trust-pill {
      padding: .7rem 1rem;
      border: 1px solid rgba(148,163,184,.18);
      border-radius: 999px;
      background: rgba(15,23,42,.72);
      color: #cbd5e1;
      font-weight: 850;
      font-size: .9rem;
    }

    .promo-carousel-card {
      position: relative;
      overflow: hidden;
      border-radius: 34px;
      background: rgba(15,23,42,.86);
      border: 1px solid rgba(148,163,184,.20);
      box-shadow: 0 32px 80px rgba(0,0,0,.35);
      min-height: 520px;
    }

    .promo-slide {
      display: none;
      min-height: 520px;
      position: relative;
    }

    .promo-slide.active {
      display: block;
      animation: fadeSlide .45s ease;
    }

    @keyframes fadeSlide {
      from {
        opacity: 0;
        transform: scale(.985);
      }
      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    .promo-slide-image {
      width: 100%;
      height: 520px;
      display: block;
      object-fit: cover;
      filter: brightness(.78);
    }

    .promo-slide-overlay {
      position: absolute;
      inset: 0;
      display: flex;
      align-items: flex-end;
      padding: 1.6rem;
      background: linear-gradient(180deg, rgba(2,6,23,.08), rgba(2,6,23,.86));
    }

    .promo-slide-content {
      width: 100%;
      padding: 1.35rem;
      border-radius: 26px;
      background: rgba(8,13,25,.82);
      border: 1px solid rgba(255,255,255,.14);
      backdrop-filter: blur(14px);
    }

    .promo-slide-content h2 {
      color: #f8fafc;
      font-size: clamp(1.7rem, 3vw, 2.4rem);
      margin: .35rem 0;
      line-height: 1.05;
      letter-spacing: -.04em;
    }

    .promo-slide-content p {
      color: #cbd5e1;
      line-height: 1.6;
      margin: 0;
    }

    .discount-badge-pro {
      display: inline-flex;
      align-items: center;
      gap: .4rem;
      padding: .55rem .85rem;
      border-radius: 999px;
      background: rgba(251,191,36,.18);
      color: #fde68a;
      border: 1px solid rgba(251,191,36,.26);
      font-weight: 950;
      font-size: .9rem;
    }

    .carousel-controls {
      position: absolute;
      top: 1rem;
      right: 1rem;
      display: flex;
      gap: .55rem;
      z-index: 5;
    }

    .carousel-btn {
      width: 40px;
      height: 40px;
      border: 1px solid rgba(255,255,255,.20);
      border-radius: 999px;
      background: rgba(8,13,25,.74);
      color: #f8fafc;
      cursor: pointer;
      font-size: 1.25rem;
      font-weight: 900;
      display: grid;
      place-items: center;
      backdrop-filter: blur(12px);
    }

    .carousel-btn:hover {
      background: rgba(56,189,248,.22);
    }

    .carousel-dots {
      position: absolute;
      left: 1.5rem;
      top: 1.5rem;
      display: flex;
      gap: .45rem;
      z-index: 5;
    }

    .carousel-dot {
      width: 9px;
      height: 9px;
      border-radius: 999px;
      border: 0;
      background: rgba(255,255,255,.35);
      cursor: pointer;
    }

    .carousel-dot.active {
      width: 26px;
      background: #38bdf8;
    }

    .public-section-pro {
      padding-top: 4.5rem;
      padding-bottom: 4.5rem;
    }

    .public-section-title {
      display: flex;
      justify-content: space-between;
      align-items: end;
      gap: 1rem;
      margin-bottom: 1.5rem;
      flex-wrap: wrap;
    }

    .public-section-title h2 {
      font-size: clamp(2rem, 3.4vw, 3.2rem);
      letter-spacing: -.055em;
      margin: .25rem 0 0;
    }

    .product-card-pro {
      overflow: hidden;
      border-radius: 28px;
      background: rgba(15,23,42,.86);
      border: 1px solid rgba(148,163,184,.18);
      box-shadow: 0 22px 55px rgba(0,0,0,.22);
      transition: .18s ease;
    }

    .product-card-pro:hover {
      transform: translateY(-5px);
      border-color: rgba(56,189,248,.35);
    }

    .product-card-pro .product-image {
      height: 210px;
      background: rgba(255,255,255,.04);
    }

    .product-card-pro .product-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .product-content-pro {
      padding: 1.2rem;
      display: grid;
      gap: .75rem;
    }

    .product-title-pro {
      color: #f8fafc;
      font-size: 1.18rem;
      margin: 0;
    }

    .product-description-pro {
      min-height: 48px;
    }

    .promo-grid-pro {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 1.2rem;
    }

    .promo-card-pro {
      border-radius: 28px;
      overflow: hidden;
      background: rgba(15,23,42,.86);
      border: 1px solid rgba(148,163,184,.18);
      box-shadow: 0 22px 55px rgba(0,0,0,.22);
    }

    .promo-card-pro img {
      width: 100%;
      height: 210px;
      object-fit: cover;
      display: block;
    }

    .promo-card-body-pro {
      padding: 1.2rem;
      display: grid;
      gap: .65rem;
    }

    .promo-card-body-pro h3 {
      color: #f8fafc;
      margin: 0;
      font-size: 1.25rem;
    }

    .branch-list-pro {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 1rem;
    }

    .branch-card-pro {
      padding: 1.2rem;
      border-radius: 24px;
      background: rgba(15,23,42,.86);
      border: 1px solid rgba(148,163,184,.18);
    }

    .branch-card-pro strong {
      color: #f8fafc;
      font-size: 1.1rem;
    }

    .faq-grid-pro {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 1rem;
    }

    .faq-card-pro {
      padding: 1.2rem;
      border-radius: 24px;
      background: rgba(15,23,42,.86);
      border: 1px solid rgba(148,163,184,.18);
    }

    .faq-card-pro h3 {
      color: #f8fafc;
      margin: .7rem 0 .5rem;
      font-size: 1.1rem;
    }

    .empty-public-card {
      grid-column: 1 / -1;
      padding: 1.4rem;
      border-radius: 24px;
      background: rgba(15,23,42,.78);
      border: 1px solid rgba(148,163,184,.18);
      color: #cbd5e1;
    }

    @media (max-width: 1050px) {
      .home-hero-pro {
        grid-template-columns: 1fr;
      }

      .promo-carousel-card,
      .promo-slide,
      .promo-slide-image {
        min-height: 430px;
        height: 430px;
      }

      .promo-grid-pro,
      .branch-list-pro,
      .faq-grid-pro {
        grid-template-columns: repeat(2, minmax(0, 1fr));
      }
    }

    @media (max-width: 700px) {
      .home-hero-pro {
        padding: 2.2rem 1rem;
      }

      .hero-copy-pro h1 {
        font-size: 2.7rem;
      }

      .promo-carousel-card,
      .promo-slide,
      .promo-slide-image {
        min-height: 390px;
        height: 390px;
      }

      .promo-slide-overlay {
        padding: 1rem;
      }

      .promo-grid-pro,
      .branch-list-pro,
      .faq-grid-pro {
        grid-template-columns: 1fr;
      }
    }
  </style>

  <section class="home-hero-pro">
    <div class="hero-copy-pro">
      <p class="eyebrow">Compra rápido, fácil y cerca de ti</p>

      <h1>Tu mini súper de confianza con una experiencia más moderna.</h1>

      <div class="hero-actions-pro">
        <a class="primary-button" href="#catalogo">Ver productos</a>
        <a class="secondary-button" href="{{ route('login') }}">Entrar al panel</a>
      </div>

      <div class="hero-trust-row">
        <span class="trust-pill">🛒 Catálogo disponible</span>
        <span class="trust-pill">🔥 Promociones vigentes</span>
        <span class="trust-pill">📍 Sucursales cercanas</span>
      </div>
    </div>

    <div class="promo-carousel-card" id="promoCarousel">
      @forelse($promociones as $promo)
        @php
          $imagenPromo = $promo->imagen ?: 'promo'.$promo->id_promocion.'.jpeg';
        @endphp

        <article class="promo-slide {{ $loop->first ? 'active' : '' }}">
          <img
            class="promo-slide-image"
            src="{{ asset('assets/img/'.$imagenPromo) }}"
            alt="{{ $promo->nombre }}"
          >

          <div class="promo-slide-overlay">
            <div class="promo-slide-content">
              <span class="discount-badge-pro">
                {{ number_format($promo->descuento, 0) }}% OFF
              </span>

              <h2>{{ $promo->nombre }}</h2>

              <p>
                {{ $promo->descripcion }}
              </p>
            </div>
          </div>
        </article>
      @empty
        <article class="promo-slide active">
          <img
            class="promo-slide-image"
            src="{{ asset('assets/img/logo-lacasita.jpeg') }}"
            alt="La Casita"
          >

          <div class="promo-slide-overlay">
            <div class="promo-slide-content">
              <span class="discount-badge-pro">La Casita</span>
              <h2>Promociones próximamente</h2>
              <p>Muy pronto encontrarás ofertas y descuentos para tu despensa.</p>
            </div>
          </div>
        </article>
      @endforelse

      @if($promociones->count() > 1)
        <div class="carousel-dots">
          @foreach($promociones as $promo)
            <button
              class="carousel-dot {{ $loop->first ? 'active' : '' }}"
              type="button"
              data-slide="{{ $loop->index }}"
              aria-label="Ver promoción {{ $loop->iteration }}"
            ></button>
          @endforeach
        </div>

        <div class="carousel-controls">
          <button class="carousel-btn" type="button" id="promoPrev" aria-label="Promoción anterior">‹</button>
          <button class="carousel-btn" type="button" id="promoNext" aria-label="Promoción siguiente">›</button>
        </div>
      @endif
    </div>
  </section>

  <section class="section shell public-section-pro" id="catalogo">
    <div class="public-section-title">
      <div>
        <p class="eyebrow">Catálogo público</p>
        <h2>Productos destacados</h2>
      </div>

      <a class="secondary-button" href="{{ route('login') }}">Iniciar sesión para comprar</a>
    </div>

    <div class="product-grid">
      @forelse($productos as $producto)
        <article class="product-card-pro">
          <div class="product-image">
            <img
              src="{{ asset('assets/img/'.$producto->imagen) }}"
              alt="{{ $producto->nombre }}"
            >
          </div>

          <div class="product-content-pro">
            <div class="product-meta">
              <span>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</span>
              <span class="stock-badge">Stock {{ $producto->stock }}</span>
            </div>

            <h3 class="product-title-pro">{{ $producto->nombre }}</h3>

            <p class="muted product-description-pro">
              {{ $producto->descripcion }}
            </p>

            <div class="product-meta">
              <span class="price">${{ number_format($producto->precio, 2) }}</span>
              <a class="primary-button compact" href="{{ route('login') }}">Comprar</a>
            </div>
          </div>
        </article>
      @empty
        <div class="empty-public-card">
          No hay productos destacados disponibles por el momento.
        </div>
      @endforelse
    </div>
  </section>

  <section class="section shell public-section-pro" id="ofertas">
    <div class="public-section-title">
      <div>
        <p class="eyebrow">Ahorra más</p>
        <h2>Promociones vigentes</h2>
      </div>
    </div>

    <div class="promo-grid-pro">
      @forelse($promociones as $promo)
        @php
          $imagenPromo = $promo->imagen ?: 'promo'.$promo->id_promocion.'.jpeg';
        @endphp

        <article class="promo-card-pro">
          <img
            src="{{ asset('assets/img/'.$imagenPromo) }}"
            alt="{{ $promo->nombre }}"
          >

          <div class="promo-card-body-pro">
            <p class="eyebrow">
              {{ $promo->fecha_inicio->format('d/m/Y') }}
              al
              {{ $promo->fecha_fin->format('d/m/Y') }}
            </p>

            <h3>{{ $promo->nombre }}</h3>

            <span class="discount-badge-pro">
              {{ number_format($promo->descuento, 0) }}% OFF
            </span>

            <p class="muted">
              {{ $promo->descripcion }}
            </p>

            <p>
              <strong>Productos:</strong>
              {{ $promo->productos->pluck('nombre')->join(', ') ?: 'Seleccionados' }}
            </p>
          </div>
        </article>
      @empty
        <div class="empty-public-card">
          No hay promociones vigentes por el momento.
        </div>
      @endforelse
    </div>
  </section>

  <section class="section shell public-section-pro" id="sucursales">
    <div class="public-section-title">
      <div>
        <p class="eyebrow">Cobertura</p>
        <h2>Sucursales registradas</h2>
      </div>

      <p class="muted">Consulta ubicación y abre la ruta en Google Maps.</p>
    </div>

    <div class="branch-list-pro">
      @forelse($sucursales as $sucursal)
        <article class="branch-card-pro">
          <strong>{{ $sucursal->nombre }}</strong>

          <p class="muted">
            {{ $sucursal->direccion }}
          </p>

          <p>
            📍 {{ $sucursal->ciudad }} · ☎ {{ $sucursal->telefono }}
          </p>

          <a class="mini-link" href="{{ $sucursal->url_maps }}" target="_blank">
            Cómo llegar
          </a>
        </article>
      @empty
        <div class="empty-public-card">
          No hay sucursales registradas por el momento.
        </div>
      @endforelse
    </div>
  </section>

  <section class="section shell public-section-pro" id="faq">
    <div class="public-section-title">
      <div>
        <p class="eyebrow">Preguntas frecuentes</p>
        <h2>Ayuda para clientes</h2>
      </div>
    </div>

    <div class="faq-grid-pro">
      @forelse($faqs as $faq)
        <article class="faq-card-pro">
          <span class="stock-badge">{{ $faq->categoria }}</span>

          <h3>{{ $faq->pregunta }}</h3>

          <p class="muted">
            {{ $faq->respuesta }}
          </p>
        </article>
      @empty
        <div class="empty-public-card">
          No hay preguntas frecuentes registradas por el momento.
        </div>
      @endforelse
    </div>
  </section>
</main>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.getElementById('promoCarousel');

    if (!carousel) {
      return;
    }

    const slides = carousel.querySelectorAll('.promo-slide');
    const dots = carousel.querySelectorAll('.carousel-dot');
    const prev = document.getElementById('promoPrev');
    const next = document.getElementById('promoNext');

    if (slides.length <= 1) {
      return;
    }

    let current = 0;

    function showSlide(index) {
      current = (index + slides.length) % slides.length;

      slides.forEach(function (slide, slideIndex) {
        slide.classList.toggle('active', slideIndex === current);
      });

      dots.forEach(function (dot, dotIndex) {
        dot.classList.toggle('active', dotIndex === current);
      });
    }

    if (prev) {
      prev.addEventListener('click', function () {
        showSlide(current - 1);
      });
    }

    if (next) {
      next.addEventListener('click', function () {
        showSlide(current + 1);
      });
    }

    dots.forEach(function (dot) {
      dot.addEventListener('click', function () {
        showSlide(Number(dot.dataset.slide));
      });
    });

    setInterval(function () {
      showSlide(current + 1);
    }, 5000);
  });
</script>
@endsection