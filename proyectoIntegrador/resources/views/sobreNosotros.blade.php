
@include('/layout/header')
<div class="container marketing ">
    <h2 class="tituloNosotros">Sobre nosotros </h2>
    <div class="divisionSobreNosotros"></div>
    <p class="lead main-text presentacionSobreNosotros">En [Nombre de la Empresa], vivimos y respiramos la pasión por el mate. Desde nuestros inicios como una pequeña empresa familiar, nos hemos dedicado a ofrecer productos que honran esta tradición tan arraigada en nuestra cultura.
            Creemos que el mate no es solo una bebida; es un símbolo de amistad, encuentros y momentos compartidos. Por eso, trabajamos cada día para brindarte una selección de productos diseñados con calidad, estilo y funcionalidad. Desde mates de madera y calabaza hasta bombillas de acero, sets materos y accesorios, cada pieza refleja nuestro compromiso con la excelencia.
            Nuestro equipo está conformado por personas apasionadas que valoran tanto el diseño como la practicidad. Nos enorgullece apoyar a artesanos locales y fomentar el uso de materiales sostenibles para cuidar nuestro planeta mientras disfrutamos de esta tradición.
            Acompáñanos en este viaje mate por mate, y permitamos que esta experiencia continúe uniendo corazones. ¡Gracias por elegirnos como parte de tus momentos más especiales!</p>

    <div class="row ">
        
        <div class="col-lg-3">
                 <img src="./img/fede.png" alt="Descripción de la imagen" class="bd-placeholder-img rounded-circle" width="140" height="140">
                 <h2 class="tituloCadaIntegrante">Fede</h2>
                 <p class="descripcion"> Desarrolló el frontend de la vista de inicio, incluyendo productos destacados y categorías. También trabajó en el backend para mostrar dinámicamente estos elementos desde la base de datos.</p>
                 <p><a class="btn btn-secondary" href="#">Descargar CV »</a></p>
        </div>
  
         <div class="col-lg-3">
                <img src="./img/gabi.webp" alt="Descripción de la imagen" class="bd-placeholder-img rounded-circle" width="140" height="140">
                <h2 class="tituloCadaIntegrante">Gabriela</h2>
                <p class="descripcion">Diseñó el frontend de las vistas "Sobre nosotros", "Contacto", "Administración", "Login", "Registro de usuario", "Crear y editar producto", asegurando una interfaz clara y funcional.</p>
                <p><a class="btn btn-secondary botonSobreNosotros" href="/descargar/CV_CHOQUE_GABRIELA">Descargar CV »</a></p>
         </div>
  
        <div class="col-lg-3">
                <img src="./img/marcos.webp" alt="Descripción de la imagen" class="bd-placeholder-img rounded-circle" width="140" height="140">
                <h2 class="tituloCadaIntegrante">Marcos</h2>
                <p class="descripcion">Administró la base de datos e integró la comunicación entre backend y frontend. Lideró el desarrollo del backend implementando funcionalidades clave.</p>
                <p><a class="btn btn-secondary botonSobreNosotros" href="/descargar/CV_Marcos_Benegas">Descargar CV »</a></p>
        </div>

        <div class="col-lg-3">
                <img src="./img/nico.jpg" alt="Descripción de la imagen" class="bd-placeholder-img rounded-circle" width="140" height="140">
                <h2 class="tituloCadaIntegrante">Nico</h2>
                <p class="descripcion">Implementó la galería de imágenes y la vista de productos, integrando el backend y la base de datos para mostrar los productos de manera clara y organizada.</p>
                <p><a class="btn btn-secondary botonSobreNosotros" href="#">Descargar CV »</a></p>
        </div>
    </div><!-- /.row -->
    

</div><!-- /.container -->

@include('/layout/footer')

