
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
