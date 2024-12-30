@include('/layout/header')

<form action="/editar/{{$producto->id_mate}}" method="post" class="editarProducto" enctype="multipart/form-data">
<h2 class="tituloEditarProducto">Editar</h2>
<p class="descripcionProducto">{{$producto->descripcion}}</p>
    @csrf
    @method("PUT")
    <input name="descripcion" value="{{old('descripcion', $producto->descripcion)}}" placeholder="descripcion">
    @error("descripcion")
                <p style="color: red;">{{$message}}</p>
            @enderror
    <input name="precio" value="{{old('precio', $producto->precio)}}"  placeholder="precio">
    @error("precio")
                <p style="color: red;">{{$message}}</p>
            @enderror
    <input name="cantidad" value="{{old('cantidad', $producto->cantidad)}}"  placeholder="cantidad">
    @error("cantidad")
                <p style="color: red;">{{$message}}</p>
            @enderror
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
                <div data-mdb-ripple-init class="editarProducto-button">
                    <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                    <input type="file" name="imagenPrincipal" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
                </div>
            </div>
        </div>
        <div>
            <p style="width: 200px;">Imágenes Secundarias </p>

            <label class="form-label m-1" for="secundariasBox">@if($galeria->isEmpty()) No tiene @else Imágenes actuales @endif</label>
            <div class="p-2 d-flex flex-wrap flex-column miniaturasEditProducto gap-1 align-items-end secundarias-box" id="secundariasBox"> 
                @foreach($galeria as $item)
                <div>
                    <img src="{{ asset('storage/img/producto/' . $producto->id_mate . '/' . $item->imgUrl2) }}" class="miniatura" alt="..." width="100px">
                    <i class="fa fa-times borrador" id="{{$item->id_imagen}}"></i>
                </div>
                @endforeach
            </div>
            <input type="text" id="secundariasNames" readonly class="mb-4 d-flex justify-content-center" placeholder="Elige nuevas para ver" />
            <div class="d-flex justify-content-center">
                <div data-mdb-ripple-init class="editarProducto-button">
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

<div>

<div class="botonesCrearProducto">
    <div>
            <a type="button" class="btn btn-secondary boton-cancelar" href="{{ url('/administracion/dashboard/') }}">Cancelar</a>

    </div>
    <div>
            <button class="editarProducto-botonFinal">Guardar</button>
    </div>
</div>

</form>
<script type="text/javascript" src="{{ asset('storage/js/script.js') }}"></script>
@include('/layout/footer')
