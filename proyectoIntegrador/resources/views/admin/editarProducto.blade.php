@include('/layout/header')
<h2>Editar</h2>
<p>{{$producto->descripcion}}</p>
<form action="/editar/{{$producto->id_mate}}" method="post" class="w-25">
    @csrf
    @method("PUT")
    <input name="descripcion" value="{{old('descripcion', $producto->descripcion)}}" placeholder="descripcion">
    <input name="precio" value="{{old('precio', $producto->precio)}}"  placeholder="precio">
    <input name="cantidad" value="{{old('cantidad', $producto->cantidad)}}"  placeholder="cantidad">
    <p>Imagenes</p>
    <p>Categorias</p>

    <button class="btn btn-dark">Guardar</button>
</form>
@include('/layout/footer')
