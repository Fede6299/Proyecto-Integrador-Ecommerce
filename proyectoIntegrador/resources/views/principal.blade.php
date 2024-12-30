@include('/layout/header')
@if (session()->has("success"))
        <div class="container">
            <div class="alert alert-success text-center">{{ session("success") }}</div>
        </div>
      @endif
      @if (session()->has("fail"))
        <div class="container">
            <div class="alert alert-danger text-center">{{ session("fail") }}</div>
        </div>
      @endif

<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner h-100">
    <div class="carousel-item active">
      <img src="{{ asset('storage/img/1.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('storage/img/2.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('./img/3.jpg') }}" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<section class="productos_destacados">
  <h2>Productos destacados</h2>
  <div class="row row-cols-1 row-cols-md-4 g-4">
    @foreach($destacados as $destacado)
    @if ($destacado->producto->estado != 0 && $destacado->producto->eliminado != 1)
    <div class="col d-flex justify-content-center">
      <div class="card h-100 contentCard">
        <img src="{{asset('storage/'.$destacado->producto->imgUrl)}}"  class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $destacado->producto?->descripcion ?? 'Producto no disponible' }}</h5>
          <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->

          <a type="button" href="{{asset('/productos/producto/'.$destacado->producto->nombreLink->nombre_Link)}}" class="btn btn-warning btn-naranja px-5">Ver más</a>
        </div>
      </div>
    </div>
    @endif
    @endforeach
  </div>
</section>
<section class="categorias">
  <h2>Categorias</h2>
  <div class="row row-cols-1 row-cols-md-4 g-4">
    @foreach($categoriasIndex as $categoria)
    <div class="col text-center position-relative">
      <a href="{{ url('/productos/' . $categoria->categoria) }}">
        <p class="categoria-text">{{ $categoria->categoria }}</p>
        <img src="{{ asset('storage/img/categorias/' . $categoria->id_categoria .'.webp') }}" class="img-fluid" alt="{{ $categoria->categoria }}">
      </a>
    </div>
    @endforeach
  </div>
</section>
<section class="elements">
  <div>
    <i class="las la-credit-card"></i>
    <p class="element-text">MEDIOS DE PAGO</p>
    <p class="sub-text">Efectivo, transferencia, tarjeta de débito.</p>
  </div>
  <div>
    <i class="las la-shopping-bag"></i>
    <p class="element-text">COMPRA EN ENFECTIVO</p>
    <p class="sub-text">10% OFF Min. $10.000</p>
  </div>
  <div>
    <i class="las la-truck"></i>
    <p class="element-text">ENVIOS A TODO EL PAIS</p>
    <p class="sub-text">por el transporte de tu preferencia, en 72hs</p>
  </div>
  <div>
    <i class="las la-headset"></i>
    <p class="element-text">ATENCIÓN AL CLIENTE</p>
    <p class="sub-text">Lunes a viernes de 9 a 18hs</p>
  </div>
</section>

@include('/layout/footer')

