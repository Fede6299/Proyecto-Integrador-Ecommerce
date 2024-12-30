@include('/layout/header')

<section class="d-flex p-2 justify-content-between align-items-center">
  <h2>Productos <span>{{count($productos)}}</span></h2>


  <a href="{{ url('/administracion/dashboard/crear-producto') }}" class=" nuevoProductoBtn">+ Nuevo producto</a>

</section>
<section class="searchSpace my-3">
  <form class="d-flex" onsubmit="buscarProductoAdmin(event)">
  <input 
      type="text" 
      class="form-control" 
      placeholder="Buscar..." 
      id="inputBuscarId" 
      autocomplete="off" 
  >

  <button class="botonProductBuscar">Buscar</button>
  </form>


</section>


@if (session()->has("success"))
        <div class="container">
            <div class="alert alert-success text-center">{{ session("success") }}</div>
        </div>
@endif




<table class="tablaProductos ">
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

                  <th>
                    <a style="text-decoration: none; color:rgb(33, 37, 41);" href="{{asset('/productos/producto/'.$producto->nombreLink->nombre_Link)}}">{{ $producto->descripcion }}</a>
                    
                  </th>

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
                    <img src="{{asset('storage/'.$producto->imgUrl)}}" alt="imagen" style="max-width: 50px;">
                  <th >
                    <div class="acciones d-flex justify-content-around">
                    <a href="/administracion/dashboard/{{ $producto->id_mate }}/editar-producto">
                      <i class="fa fa-edit"></i>
                      </a>


                       <!-- Modal -->
              <div class="modal fade" id="{{ $producto->id_mate }}Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">¿Desea eliminar el producto?</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <p style="font-size: 20px;">{{ $producto->descripcion }}</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                          <form action="/producto/eliminar/{{ $producto->id_mate }}" method="post">
                            @csrf
                            @method("PUT")
                            <button class=" btn btn-primary  btn-danger">Eliminar</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Fin del modal -->



                      <!-- <form action="/producto/eliminar/{{ $producto->id_mate }}" method="post">
                          @csrf
                          @method("PUT") -->
                          <button  data-bs-toggle="modal" data-bs-target="#{{ $producto->id_mate }}Modal" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                      <!-- </form> -->
                    </div>
                      
                  </th>
              
             

              </tr>
              
           
              @endif
           
          @endforeach
      </tbody>
  </table>




@include('/layout/footer')
