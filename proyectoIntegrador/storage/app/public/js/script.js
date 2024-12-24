
/* PRODUCTO */

const bigImage = document.getElementById('imgGrande');
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


  
