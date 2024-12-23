@include('/layout/header')
<h2>Editar</h2>
<p>{{$producto->descripcion}}</p>
<form action="/editar/{{$producto->id_mate}}" method="post" class="w-25">
    @csrf
    @method("PUT")
    <input name="descripcion" value="{{old('descripcion', $producto->descripcion)}}" placeholder="descripcion">
    <input name="precio" value="{{old('precio', $producto->precio)}}"  placeholder="precio">
    <input name="cantidad" value="{{old('cantidad', $producto->cantidad)}}"  placeholder="cantidad">
    <select name="estado" class="form-select form-select-lg mb-3" aria-label="Ejemplo de .form-select-lg">
        <option <?php if($producto->estado !=0){ echo 'selected';}?> value="1">Activo</option>
        <option <?php if($producto->estado ==0){ echo 'selected';}?> value="0">Inactivo</option>
    </select>
    <p>Imagenes</p>
    <p>Categorias</p>

    <button class="btn btn-dark">Guardar</button>
</form>
@include('/layout/footer')
