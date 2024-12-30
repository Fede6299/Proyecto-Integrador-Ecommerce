@include('/layout/header')

<form action="/crear" method="post" enctype="multipart/form-data" class="crearProducto">
<h2 class="tituloCrearProducto">Crear producto</h2>
    @csrf
    <input name="descripcion" placeholder="Descripción">
    @error("descripcion")
                <p style="color: red;">{{$message}}</p>
            @enderror
    <input name="precio" placeholder="Precio">
    @error("precio")
                <p style="color: red;">{{$message}}</p>
            @enderror
    <input name="cantidad" placeholder="Cantidad">
    @error("cantidad")
                <p style="color: red;">{{$message}}</p>
            @enderror
    <div class="d-flex flex-row mb-4 gap-3">
        <div>
            <p>Imagen Principal</p>
            <div class="mb-3 d-flex justify-content-center">
                <img id="selectedImage" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
                alt="Imagen principal" style="width: 300px;" />
            </div>
            <div class="d-flex justify-content-center">
                <div data-mdb-ripple-init>
                <label class="cargaDeProducto-button" for="customFile1">Elegir imagen</label>
                <input type="file" name="imagenPrincipal" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
                </div>
            </div>
        </div>
        <div>
            <p>Imágenes Secundarias</p>
            <input type="text" id="secundariasNames" readonly placeholder="Elige para ver preview" />
            <div class="d-flex justify-content-center">
              <div data-mdb-ripple-init >
                <label class="cargaDeProducto-button" for="customFiles2">Elegir imágenes</label>
                <input type="file" multiple name="imagenesSecundarias[]" class="form-control d-none" id="customFiles2" />
              </div> 
            </div>
        </div>
    </div>

    <p>Categorias</p>
    <select name="categorias[]" placeholder="search" multiselect-search="true"  multiple style="width:300px">
        @foreach($categorias as $categoria)
            <option value="{{$categoria->id_categoria}}">{{$categoria->categoria}}</option>
        @endforeach
        
    </select>
    <button class="crearProducto-botonFinal">Crear</button>

</form>

<script type="text/javascript" src="{{ asset('storage/js/script.js') }}"></script>
<script>
</script>



@include('/layout/footer')