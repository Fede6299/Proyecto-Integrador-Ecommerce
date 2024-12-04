@include('/layout/header')


<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner h-100">
    <div class="carousel-item active">
      <img src="{{ asset('./img/1.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('./img/2.jpg') }}" class="d-block w-100" alt="...">
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
<section>
  <h2>Productos destacados</h2>
  @foreach($destacados as $destacado)
  <h3>{{ $destacado->producto?->descripcion ?? 'Producto no disponible' }}</h3>
    
  @endforeach
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
</section>




@include('/layout/footer')

