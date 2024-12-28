@include('/layout/header')

<div class="cuerpoContato">
    
        <form class="formContacto" action="#" method="POST">
        <div class="form-group" style="grid-column: span 2;">
                
                <h2 class="tituloContacto">Formulario de contacto</h2>
            </div>
            

            <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="">
            <label for="floatingInput">Nombre</label>
            </div>
            <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="">
            <label for="floatingInput">Apellido</label>
            </div>
            
       
            <div class="form-floating mb-3" style="grid-column: span 2;">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Número de teléfono</label>
            </div>
            <div class="form-floating mb-3" style="grid-column: span 2;">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-group" style="grid-column: span 2;">
                <label for="comentarios">Comentarios</label>
                <textarea id="comentarios" name="comentarios" rows="4" placeholder="Comentarios" required></textarea>
            </div>
            <button class="botonEnviar" type="submit">Enviar</button>
        </form>
   
</div>


@include('/layout/footer')