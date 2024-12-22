@include('/layout/header')
<h2>Crear</h2>
<form action="/crear" method="post" class="w-25">
    @csrf
    <input name="descripcion" placeholder="descripcion">
    <input name="precio" placeholder="precio">
    <input name="cantidad" placeholder="cantidad">
    <p>Imagenes</p>
    <p>Categorias</p>

    <button class="btn btn-dark">Crear</button>
</form>
@include('/layout/footer')
