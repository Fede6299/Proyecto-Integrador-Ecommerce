@include('/layout/header')
<h2>Crear</h2>
<form action="/crear" method="post" class="w-25" enctype="multipart/form-data">
    @csrf
    <input name="descripcion" placeholder="descripcion">
    <input name="precio" placeholder="precio">
    <input name="cantidad" placeholder="cantidad">

    <div>
        <p>Imagen Principal </p>

        <div class="mb-4 d-flex justify-content-center">
            <img id="selectedImage" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
            alt="example placeholder" style="width: 300px;" />
        </div>
        <div class="d-flex justify-content-center">
            <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                <input type="file" name="imagenPrincipal" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
            </div>
        </div>
    </div>

    <div>
        <p>ingrese imagenes del producto</p>
    </div>


    <!-- <select style="width:300px" name="field2" id="field2" placeholder="search" multiple multiselect-search="true"  multiselect-max-items="3" onchange="console.log(this.selectedOptions)"> -->

    <p>Categorias</p>
    <select name="categorias[]" placeholder="search" multiselect-search="true"  multiple style="width:300px">
        @foreach($categorias as $categoria)
            <option value="{{$categoria->id_categoria}}">{{$categoria->categoria}}</option>
        @endforeach

    </select>


    <button class="btn btn-dark">Crear</button>
</form>



<script>
</script>
@include('/layout/footer')


