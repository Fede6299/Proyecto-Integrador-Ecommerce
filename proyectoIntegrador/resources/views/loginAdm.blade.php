@include('/layout/header')
@if (session()->has("success"))
        <div class="container">
            <div class="alert alert-success text-center">{{ session("success") }}</div>
        </div>
      @endif
<form method="POST" action="/loginUser">
    @csrf
    <input name="userName" placeholder="usuario" type="text">
    <input name="password" placeholder="password" type="password">
    <button>ingresar</button>
</form>

@include('/layout/footer')
