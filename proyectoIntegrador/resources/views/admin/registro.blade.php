
@include('/layout/header')

<div class="formulario-container">
    <form class="formulario" method="POST" action="/registrar">
            <div class="form-group" style="grid-column: span 2;">
                
                <h2 class="tituloRegistro">Registro de nuevo usuario</h2>
            </div>
        @csrf
        <div>
            <label for="nombre">Nombre:</label>
            <input name="nombre" placeholder="Nombre" type="text">
                @error("nombre")
                <p>{{$message}}</p>
                @enderror
        </div>
        <div>
            <label for="apellido">Apellido:</label>
            <input name="apellido" placeholder="Apellido" type="text">
             @error("apellido")
            <p>{{$message}}</p>
             @enderror
        </div>
        <div>
            <label for="user_name">Nombre de usuario:</label>
            <input name="user_name" placeholder="Nombre de usuario" type="text">
             @error("userName")
            <p>{{$message}}</p>
             @enderror
        </div>
        <div>
            <label for="email">Correo:</label>
            <input name="email" placeholder="Correo" type="email">
            @error("email")
            <p>{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input name="password" placeholder="Contraseña" type="password">
            @error("password")
            <p>{{$message}}</p>
             @enderror
        </div>
        <div>
            <label for="password_confirmation">Repita la contraseña:</label>
            <input name="password_confirmation" placeholder="Repita la contraseña" type="password">

        </div>
        <button class="botonRegistrar">Registrar</button>
    </form>
</div>

@include('/layout/footer')
