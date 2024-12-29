@include('/layout/header')

<div class="cuerpoContato">
    
        <form class="formContacto" action="/enviarContacto" method="POST">
              @csrf
        <div class="form-group" style="grid-column: span 2;">
                
                <h2 class="tituloContacto">Formulario de contacto</h2>
            </div>
            

            <div class="form-floating mb-3">
            <input type="text" name="nombre" class="form-control" id="floatingInput" placeholder="">
            <label for="floatingInput">Nombre</label>
            </div>
            <div class="form-floating mb-3">
            <input type="text" name="apellido" class="form-control" id="floatingInput" placeholder="">
            <label for="floatingInput">Apellido</label>
            </div>
            
       
            <div class="form-floating mb-3" style="grid-column: span 2;">
                <input type="number"name="telefono" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Número de teléfono</label>
            </div>
            <div class="form-floating mb-3" style="grid-column: span 2;">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
      
            <div class="form-floating" style="grid-column: span 2;">
            <textarea class="form-control" name="comentario" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Comments</label>
</div>

            <button class="botonEnviar" type="submit">Enviar</button>
        </form>
   
</div>


@include('/layout/footer')