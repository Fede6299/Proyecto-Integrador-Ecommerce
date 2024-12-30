@include('/layout/header')

<div class="cuerpoContato">
    
        <form class="formContacto" action="/enviarContacto" method="POST">
              @csrf
        <div class="form-group" style="grid-column: span 2;">
                
                <h2 class="tituloContacto">CONSULTÁ AHORA</h2>
                <div class="divisionAmarilla"></div>
                <p class="subtituloContacto">Realizanos una consulta utilizando el siguiente formulario. A la brevedad nos pondremos en contacto.</p>
            </div>
            

            <div class="form-floating mb-3">
            <input type="text" name="nombre" class="form-control" id="floatingInput" placeholder="" require>
            <label for="floatingInput">Nombre</label>
            @error('nombre')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-floating mb-3">
            <input type="text" name="apellido" class="form-control" id="floatingInput" placeholder="" require>
            <label for="floatingInput">Apellido</label>
            @error('apellido')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            </div>
            
       
            <div class="form-floating mb-3" style="grid-column: span 2;">
                <input type="number"name="telefono" class="form-control" id="floatingInput" placeholder="name@example.com" require>
                <label for="floatingInput">Número de teléfono</label>
                @error('telefono')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            </div>
            <div class="form-floating mb-3" style="grid-column: span 2;">
                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
                @error('email')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            </div>
      
            <div class="form-floating" style="grid-column: span 2;">
            <textarea class="form-control" name="comentario" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Mensaje</label>
</div>

            <button class="botonEnviar" type="submit">Enviar</button>
        </form>
   
</div>

<div class="datosContacto">
    <div class="dato">
        <span class="icono"><i class="fas fa-envelope"></i></span>
        <span class="titulo">Email:</span>
        <span class="detalle">grupo_01@cursophp.com.ar</span>
    </div>
    <div class="dato">
        <span class="icono"><i class="fas fa-phone"></i></span>
        <span class="titulo">Teléfonos:</span>
        <span class="detalle">
            (011) 1523452368
        </span>
    </div>
</div>



@include('/layout/footer')