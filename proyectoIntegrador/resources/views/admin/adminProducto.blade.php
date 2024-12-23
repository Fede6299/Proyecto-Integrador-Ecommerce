@include('/layout/header')

<section class="d-flex p-2 justify-content-between">
  <h2>Productos <span>{{count($productos)}}</span></h2>


  <a href="{{ url('/administracion/dashboard/crear-producto') }}" class="btn btn-dark">+ Nuevo producto</a>

</section>
@if (session()->has("success"))
        <div class="container">
            <div class="alert alert-success text-center">{{ session("success") }}</div>
        </div>
@endif
<table class="table">
  <thead>
    <tr>
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
              <tr>
                <!-- <td>{{$producto}}</td> -->
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
                  <th>{{ $producto->precio }}</th>
                  <th>
                    <?php  
                    if($producto->categorias->isNotEmpty()){
                      foreach($producto->categorias as $categoria){
                        echo ($categoria->categoria);
                        echo ",";}

                    } else {
                      echo "sin categoría";
                    }
                    ?>

                  </th>
                  <th>{{ $producto->imgUrl }}</th>
                  <th>
                      <a href="/producto/{{ $producto->id_mate }}/editar-producto"><i class="fa fa-edit"></i></a>
                      <form action="/producto/{{ $producto->id_producto }}" method="post">
                          @csrf
                          @method("DELETE")
                          <button><i class="fa fa-trash"></i></button>
                      </form>
                  </th>
              </tr>
          @endforeach
      </tbody>
  </table>




@include('/layout/footer')
