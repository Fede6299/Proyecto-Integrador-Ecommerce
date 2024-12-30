@include('/layout/header')
@if (session()->has("success"))
        <div class="container">
            <div class="login-alert-success text-center">{{ session("success") }}</div>
        </div>
    @endif
    @if (session()->has("fail"))
        <div class="container">
            <div class="alert alert-danger text-center">{{ session("fail") }}</div>
        </div>
      @endif
<div class="login-form-container">

    
    <form class="login-form" method="POST" action="/loginUser">
    <h2 class="tituloLogin">Acceder</h2>
        @csrf
        <div>
            <input class="login-input" name="user_name" placeholder="usuario" type="text">
            @error("user_name")
                <p class="login-error">{{$message}}</p>
            @enderror
        </div>
        <div>
            <input class="login-input" name="password" placeholder="contraseña" type="password">
            @error("password")
                <p class="login-error">{{$message}}</p>
            @enderror
        </div>
        <button class="login-button">Iniciar seción</button>
    </form>
</div>

@include('/layout/footer')