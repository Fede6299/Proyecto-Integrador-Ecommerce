@include('/layout/header')
<form method="POST" action="/registrar">
    @csrf
    <div>
        <input name="nombre" placeholder="Nombre" type="text">
        @error("nombre")
            <p>{{$message}}</p>
        @enderror
    </div>
    <div>
        <input name="apellido" placeholder="Apellido" type="text">
        @error("apellido")
            <p>{{$message}}</p>
        @enderror
    </div>
    <div>
    <input name="user_name" placeholder="Nombre de usuario" type="text">
        @error("userName")
            <p>{{$message}}</p>
        @enderror
    </div>
    <div>
        <input name="email" placeholder="Correo" type="email">
        @error("email")
            <p>{{$message}}</p>
        @enderror
    </div>
    <div>
    <input name="password" placeholder="Contraseña" type="password">
        @error("password")
            <p>{{$message}}</p>
        @enderror
    </div>
    <input name="password_confirmation" placeholder="Repita la contraseña" type="password">

    </div>
    
    
    <button>Registrar</button>
</form>

@include('/layout/footer')
