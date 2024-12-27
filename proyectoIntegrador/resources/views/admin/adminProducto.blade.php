@include('/layout/header')

<section class="d-flex p-2 justify-content-between">
  <h2>Productos <span>{{count($productos)}}</span></h2>


  <a href="{{ url('/administracion/dashboard/crear-producto') }}" class="btn btn-dark">+ Nuevo producto</a>

</section>
<section class="searchSpace">
  <form class="d-flex" onsubmit="buscarProductoAdmin(event)">
  <input 
      type="text" 
      class="form-control" 
      placeholder="Buscar..." 
      id="inputBuscarId" 
      autocomplete="off" 
  >

  <button>Buscar</button>
  </form>


</section>


@if (session()->has("success"))
        <div class="container">
            <div class="alert alert-success text-center">{{ session("success") }}</div>
        </div>
@endif
<table class="table">
  <thead>
    <tr>
      <th scope="col"> Destacado</th>
      <th scope="col">Id</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Estado</th>
      <th scope="col">Precio</th>
      <th scope="col">Categoria</th>
      <th scope="col">Imagen</th>
      <th scope="col">Acciones</th>
    </tr>
    </thead>
      <tbody class="table-group-divider">
          @foreach($productos as $producto)
          @if($producto->eliminado != 1)
              <tr>
                  <th>  
                    <input
                      type="checkbox"
                      class="custom-control-check"
                      data-id="{{$producto->id_mate}}" 
                      <?php 
                        if(in_array($producto->id_mate, $productoDestacados)){
                          echo "checked";
                        }
                        else { echo "";}?>
                    >
                  </th>
                  <th>{{ $producto->id_mate }}</th>
                  <th>{{ $producto->descripcion }}</th>
                  <th>{{ $producto->cantidad }}</th>
                  <th>
                    <?php 
                    if($producto->estado != 0){
                      echo "Activo";
                    }
                    else{
                      echo "Inactivo";
                    }
                    ?> 
                  
                  </th>
                  <th>${{ $producto->precio }}</th>
                  <!-- corregir los estilos inline -->
                  <th class="catSpace"> 
                    <?php  
                    if($producto->categorias->isNotEmpty()){
                      foreach($producto->categorias as $categoria){
                        if(count($producto->categorias) > 1){
                          echo ($categoria->categoria);
                          echo ", ";
                        }else{
                          echo ($categoria->categoria);

                        }
                      }

                    } else {
                      echo "sin categoría";
                    }
                    ?>

                  </th>
                  <th>
                    <img src="{{asset('storage/'.$producto->imgUrl)}}" alt="imagen" style="width: 50px;">
                  <th>
                      <a href="/administracion/dashboard/{{ $producto->id_mate }}/editar-producto"><i class="fa fa-edit"></i></a>
                      <form action="/producto/eliminar/{{ $producto->id_mate }}" method="post">
                          @csrf
                          @method("PUT")
                          <button><i class="fa fa-trash"></i></button>
                      </form>
                  </th>
              </tr>
              @endif
          @endforeach
      </tbody>
  </table>




@include('/layout/footer')
