@include('/layout/header')
<h2>Productos {{ $categoria_id}} </h2>
<h2 class="tituloContacto">Nuestro catálogo</h2>

<div class="row row-cols-1 row-cols-md-3 g-4">
@foreach($productos as $producto)
<div class="col-md-3">
  <div class="card" >
    <a href="/productos/producto/<?php echo $producto->nombreLink->nombreLink ?? "#" ?>">
      <img src="{{ asset('storage/img/producto/mate.webp') }}" class="card-img-top" alt="...">
    </a>
    <div class="card-body">
      <p class="card-text categoria mb-1">
        <?php 
          if($producto->categorias->isNotEmpty())
              foreach($producto->categorias as $categoria){
              echo ($categoria->categoria); echo ", ";}
          else{
              echo "Sin categoría";
            }        
        ?>
      </p>
      <h5 class="card-title descripcion">{{$producto->descripcion}}</h5>
      <p class="card-text precio">${{$producto->precio}}</p>
      <a type="button" class="btn btn-warning btn-naranja" href="/productos/producto/<?php echo $producto->nombreLink->nombreLink ?? "#" ?>">Ver más</a>
    </div>
  </div>
</div>
@endforeach
</div>


@include('/layout/footer')
