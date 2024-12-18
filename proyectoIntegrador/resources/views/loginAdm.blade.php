@include('/layout/header')
<form method="POST" action="/loginUser">
    @csrf
    <input name="userName" placeholder="usuario" type="text">
    <input name="password" placeholder="password" type="password">
    <button>ingresar</button>
</form>

@include('/layout/footer')
