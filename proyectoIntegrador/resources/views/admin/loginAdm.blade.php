@include('/layout/header')
@if (session()->has("success"))
        <div class="container">
            <div class="alert alert-success text-center">{{ session("success") }}</div>
        </div>
      @endif
<form method="POST" action="/loginUser">
    @csrf
    <div>
    <input name="user_name" placeholder="usuario" type="text">
    @error("user_name")
            <p>{{$message}}</p>
        @enderror
    </div>
    <div>
    <input name="password" placeholder="password" type="password">
    @error("password")
            <p>{{$message}}</p>
        @enderror
    </div>
    <button>ingresar</button>
</form>

@include('/layout/footer')
