<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tienda mates</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('storage/css/style.css') }}">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
        
        <body class="font-sans antialiased dark:bg-black dark:text-white/50">
            <header class="bg-black navbar h-100 d-flex justify-content-around" >
                <h1 class="text-light navbar-brand mx-0 p-0">Tienda mates</h1>

                <!-- <ul class="nav nav-pills" >
                    <li class="nav-item"><a href="/" class="nav-link fw-semibold" style="color:#c47249; " >Inicio</a></li>
                    <li class="nav-item"><a href="/productos/ver-todo" class="nav-link fw-semibold" style="color:#c47249;">Productos</a></li>
                    <li class="nav-item"><a href="/sobre-nosotros" class="nav-link fw-semibold" style="color:#c47249;">Sobre nosotros</a></li>
                    <li class="nav-item"><a href="/contacto" class="nav-link fw-semibold" style="color:#c47249;">Contacto</a></li>
                </ul> -->

                <!-- PROBLEMA CON EL ESTILO PARA PRODUCTOS               -->
                <div class="text-light d-flex gap-4">           
                    <a href="{{ url('/') }}">Inicio</a>
                    <div class="dropdown">
                        <a class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Productos
                        </a>
                        <ul class="dropdown-menu px-3">
                            <li><a class="dropdown-item" href="{{ url('/productos/ver-todo') }}">Ver todo</a></li>
                            <li><a class="dropdown-item" href="{{ url('/productos/1') }}">Mates</a></li>
                            <li><a class="dropdown-item" href="{{ url('/productos/2') }}">Termos</a></li>
                            <li><a class="dropdown-item" href="{{ url('/productos/3') }}">Bombillas</a></li>
                            <li><a class="dropdown-item" href="{{ url('/productos/4') }}">Accesorios</a></li>
                        </ul>
                    </div>
                    <a href="{{ url('/sobre-nosotros') }}">Sobre nosotros</a>
                    <a href="{{ url('/contacto') }}">Contacto</a>
                    @auth
                    <form method="POST" action="/logout">
                        @csrf
                        <button>Salir</button>
                    </form>    
                    @endauth
                    
                </div>

                <section class="position-relative width-search">
            <!-- Input de búsqueda -->
                    <input 
                        type="text" 
                        class="form-control" 
                        placeholder="Buscar..." 
                        id="searchInput" 
                        autocomplete="off" 
                        oninput="filterList()"
                    >
                    <ul class="dropdown-menu bg-black width-search" aria-labelledby="dropdownMenuButton1" id="dropdownMenu">
                    </ul>
                </section>
                
            </header>
            <main class="container">





