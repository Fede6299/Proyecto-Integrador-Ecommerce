@include('/layout/header')
<main class="mt-5">
    <p class="btn btn-secondary"><a href="{{ url('/productos/ver-todo') }}" style="text-decoration: none; color: white;">Volver atras</a></p>
    <div class="d-flex flex-wrap flex-row mb-3 justify-content-center align-items-start gap-3">

        <div class="p-2 producto d-flex flex-wrap flex-row miniaturas-box gap-1">
            <img src="{{asset('storage/'.$producto->imgUrl)}}" class="miniatura" alt="..." width="100px">
            @foreach($producto->imgUrls as $imgUrl)
            <img src="{{ asset('storage/img/producto/' . $producto->id_mate . '/' . $imgUrl) }}" class="miniatura" alt="..." width="100px">
            @endforeach
        </div>

        <div class="p-1 producto">
            <img src="{{asset('storage/'.$producto->imgUrl)}}" id="imgGrande" class="imgGrande" alt="..." width="420px">
        </div>

        <div class="p-2 producto card h-100 d-flex flex-column">
            <div class="card-body d-flex flex-column">
                <h1 class="card-title">{{$producto->descripcion}}</h1>
                
                <p class="card-text categoria mb-1">
                    <?php 
                    if($producto->categorias->isNotEmpty())
                        foreach($producto->categorias as $categoria){
                        echo ($categoria->categoria); echo ", ";}
                    ?>
                </p>
                <!-- Otros elementos de la tarjeta -->
                <div class="mt-auto">
                    <p class="btn btn-secondary"><a  style="text-decoration: none; color: white;">Comprar Ahora</a></p>
                </div>
            </div>
        </div>
    </div>
</main>
@include('/layout/footer')
