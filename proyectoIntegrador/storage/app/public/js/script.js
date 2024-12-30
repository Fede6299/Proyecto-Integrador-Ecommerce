
/* PRODUCTO */

const bigImage = document.getElementById('imgGrande');
if(bigImage){
  const thumbnails = document.querySelectorAll('.miniatura');

  let permanentImage = bigImage.src;
  
  thumbnails.forEach(thumb => {
    thumb.addEventListener('mouseenter', () => {
      bigImage.src = thumb.src;
    });
  
    thumb.addEventListener('mouseleave', () => {
      bigImage.src = permanentImage;
    });
  
    thumb.addEventListener('click', () => {
      permanentImage = thumb.src;
      bigImage.src = thumb.src;
    });
  });
}

/* CREAR Y EDITAR PRODUCTO */ 

const inputImagenes = document.getElementById('customFiles2');
if(inputImagenes){
  const displayImagenes = document.getElementById('secundariasNames');

  inputImagenes.addEventListener('change', function () {
    const fileNames = Array.from(inputImagenes.files).map(file => file.name).join(', ');
    displayImagenes.value = fileNames;
  });
}

const secundariasBox = document.getElementById("secundariasBox");
if(secundariasBox){
  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  const iconos = secundariasBox.querySelectorAll('i');
  
  iconos.forEach(icon => {
    icon.onclick = function(e) {
      var url = "http://localhost:8000/producto/1/imagen/" + icon.id
      fetch(url, {method: "DELETE", headers: { 'X-CSRF-TOKEN': csrfToken }})
        .then(response => {
          console.log(response.json());
          icon.parentNode.setAttribute("hidden", '')
        })
        .catch(err => console.log(err))
    }
  });

}
