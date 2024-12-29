@include('/layout/header')
<h2 class="tituloContacto">Nuestro catálogo</h2>

<div class="row row-cols-1 row-cols-md-3 g-4">
@foreach($productos as $producto)

@if ($producto->estado != 0 && $producto->eliminado != 1)
<div class="col-md-3">
<?php echo $producto->nombre_Link ?>
  <div class="card h-100">
    <a href="/productos/producto/<?php echo $producto->nombreLink->nombre_Link ?? $producto->id_mate ?>">
    <img src="{{asset('storage/'.$producto->imgUrl)}}" class="card-img-top" alt="...">
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
      <a type="button" class="btn btn-warning btn-naranja px-5" href="/productos/producto/<?php echo $producto->nombreLink->nombre_Link ?? $producto->id_mate ?>">Ver más</a>
    </div>
  </div>
</div>
@endif
@endforeach
</div>

<!-- Agrega los enlaces de paginación -->
<div class="d-flex justify-content-center pag-naranja">
    {{ $productos->links('pagination::bootstrap-4') }}
</div>

@include('/layout/footer')
