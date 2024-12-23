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



    <p>Categorias</p>

    <button class="btn btn-dark">Crear</button>
</form>
<script>
    function displaySelectedImage(event, elementId) {
    const selectedImage = document.getElementById(elementId);
    const fileInput = event.target;

    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            selectedImage.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}
</script>
@include('/layout/footer')


