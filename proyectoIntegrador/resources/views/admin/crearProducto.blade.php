@include('/layout/header')
<h2>Crear</h2>
<form action="/crear" method="post" class="w-25" enctype="multipart/form-data">
    @csrf
    <input name="descripcion" placeholder="descripcion">
    <input name="precio" placeholder="precio">
    <input name="cantidad" placeholder="cantidad">

    <div class="d-flex flex-row mb-3  align-items-start gap-3">
        <div>
            <p>Imagen Principal </p>

            <div class="mb-4 d-flex justify-content-center">
                <img id="selectedImage" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
                alt="example placeholder" style="width: 300px;" />
            </div>
            <div class="d-flex justify-content-center">
                <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                    <label class="form-label text-white m-1" for="customFile1">Elegir imagen</label>
                    <input type="file" name="imagenPrincipal" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
                </div>
            </div>
        </div>
        <div>
            <p style="width: 200px;">Imágenes Secundarias </p>

            <input type="text" id="secundariasNames" readonly class="mb-4 d-flex justify-content-center" placeholder="Elige para ver preview" />
            <div class="d-flex justify-content-center">
                <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                    <label class="form-label text-white m-1" for="customFiles2">Elegir imágenes</label>
                    <input type="file" multiple name="imagenesSecundarias[]" class="form-control d-none" id="customFiles2" />
                </div>
            </div>
        </div>
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


<script type="text/javascript" src="{{ asset('storage/js/script.js') }}"></script>
<script>
</script>
@include('/layout/footer')


