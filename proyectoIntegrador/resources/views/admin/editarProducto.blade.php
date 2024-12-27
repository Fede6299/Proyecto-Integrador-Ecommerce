@include('/layout/header')
<h2>Editar</h2>
<p>{{$producto->descripcion}}</p>
<form action="/editar/{{$producto->id_mate}}" method="post" class="w-25" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <input name="descripcion" value="{{old('descripcion', $producto->descripcion)}}" placeholder="descripcion">
    <input name="precio" value="{{old('precio', $producto->precio)}}"  placeholder="precio">
    <input name="cantidad" value="{{old('cantidad', $producto->cantidad)}}"  placeholder="cantidad">
    <select name="estado" class="form-select form-select-lg mb-3" aria-label="Ejemplo de .form-select-lg">
        <option <?php if($producto->estado !=0){ echo 'selected';}?> value="1">Activo</option>
        <option <?php if($producto->estado ==0){ echo 'selected';}?> value="0">Inactivo</option>
    </select>
    <div class="d-flex flex-row mb-3  align-items-start gap-3">
        <div>
            <p>Imagen Principal </p>

            <div class="mb-4 d-flex justify-content-center">
                @if ($producto->imgUrl != "")
                    <img id="selectedImage" src="{{ asset('storage/'.$producto->imgUrl)}}" alt="example placeholder" style="width: 300px;" />

                @else
                <img id="selectedImage" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
                alt="example placeholder" style="width: 300px;" />
                @endif
            </div>
            <div class="d-flex justify-content-center">
                <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                    <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                    <input type="file" name="imagenPrincipal" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
                </div>
            </div>
        </div>
        <div>
            <p style="width: 200px;">Imágenes Secundarias </p>

            <label class="form-label m-1" for="actualesNames">Imágenes actuales</label>
            <textarea type="text" id="actualesNames" readonly class="mb-4 d-flex justify-content-center">{{$secundariasActuales}}</textarea>
            <input type="text" id="secundariasNames" readonly class="mb-4 d-flex justify-content-center" placeholder="Elige nuevas para ver" />
            <div class="d-flex justify-content-center">
                <div data-mdb-ripple-init class="btn btn-primary btn-rounded">
                    <label class="form-label text-white m-1" for="customFiles2">Agregar imágenes</label>
                    <input type="file" multiple name="imagenesSecundarias[]" class="form-control d-none" id="customFiles2" />
                </div>
            </div>
        </div>
    </div>

    <!-- <select style="width:300px" name="field2" id="field2" placeholder="search" multiple multiselect-search="true"  multiselect-max-items="3" onchange="console.log(this.selectedOptions)"> -->
    
 
    <p>Categorias</p>
    <select value = "{{$producto}}"  name="categorias[]" placeholder="search" multiselect-search="true"  multiple style="width:300px">
    @foreach($categorias as $categoria)

            <option <?php 
                    if(in_array($categoria->id_categoria, $categorySelected)){
                        echo "selected";
                    }
                ?> 
             value="{{$categoria->id_categoria}}">{{$categoria->categoria}}</option>
        @endforeach

    </select>


    <button class="btn btn-dark">Guardar</button>
</form>
<script type="text/javascript" src="{{ asset('storage/js/script.js') }}"></script>
@include('/layout/footer')
