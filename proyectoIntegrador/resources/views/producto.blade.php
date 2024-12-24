@include('/layout/header')
<main class="mt-5">
    <p class="btn btn-secondary"><a href="{{ url('/productos/ver-todo') }}" style="text-decoration: none; color: white;">Volver atras</a></p>
	<div class="d-flex flex-wrap flex-row mb-3 justify-content-center align-items-start gap-3">

        <div class="p-2 producto d-flex flex-wrap flex-row miniaturas-box gap-1">
            @foreach($producto->imgUrls as $imgUrl)
            <img src="{{ asset('storage/img/mates/' . $imgUrl) }}" class="miniatura" alt="..." width="100px">
            @endforeach
	    </div>

        <div class="p-1 producto">
        <img src="{{asset('storage/'.$producto->imgUrl)}}" id="imgGrande" class="imgGrande" alt="..." width="420px">

            <!-- <img src="{{ asset('storage/img/producto/mate.webp') }}" id="imgGrande" class="imgGrande" alt="..." width="420px"> -->
	    </div>

	    <div class="p-2 producto card">
            <div class="card-body">
                <h1 class="card-title">{{$producto->descripcion}}</h1>
                
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
                <h2 class="card-text">${{$producto->precio}}</h2>
                @if($producto->cantidad > 0)         
                    <p class="card-text mb-0">Stock disponible</p>         
                @else
                    <p class="card-text mb-0">Stock agotado</p>        
                @endif
                <p class="card-text categoria mb-4">Cantidad: <?php echo $producto->cantidad ?? "#" ?> unidad/es</p>
                
                <a type="button" class="btn btn-warning btn-naranja px-4" href="https://listado.mercadolibre.com.ar/<?php echo $producto->descripcion ?? "#" ?>" target="_blank">Comprar ahora</a>
            </div>
	    </div>

	</div>

    <script type="text/javascript" src="{{ asset('storage/js/script.js') }}"></script>
</main>
@include('/layout/footer')
