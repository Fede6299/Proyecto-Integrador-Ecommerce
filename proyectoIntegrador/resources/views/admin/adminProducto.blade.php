@include('/layout/header')


<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Descripcion</th>
      <th>Cantidad</th>
      <th>Precio</th>
      <th>Categoria</th>
      <th>Imagen</th>
      <th>Acciones</th>
    </tr>
    </thead>
                <tbody>
                    @foreach($productos as $producto)
                        <tr>
                          <!-- <td>{{$producto}}</td> -->
                            <th>{{ $producto->id_mate }}</th>
                            <th>{{ $producto->descripcion }}</th>
                            <th>{{ $producto->cantidad }}</th>
                            <th>{{ $producto->precio }}</th>
                            <th>{{ $producto->categorias }}</th>
                            <th>{{ $producto->imgUrl }}</th>
                            <th>
                                <a href="/producto/{{ $producto->id_producto }}/edit"><i class="fa fa-edit"></i></a>
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
