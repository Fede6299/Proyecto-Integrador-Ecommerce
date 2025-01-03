<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Mattioli</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('storage/css/style.css') }}">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
        <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css" >
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/css/multi-select-tag.css">
        <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script>
        <script type="text/javascript" src="{{ asset('storage/js/multiselect-dropdown.js') }}"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

        <body class="font-sans antialiased dark:bg-black dark:text-white/50">
            <header class="bg-black navbar h-100 d-flex justify-content-around" >
            <a href="{{ url('/') }}" class="titleNav">
                <h1 class="text-light navbar-brand mx-0 p-0 ">Mattioli</h1>

            </a>    
                <div class="text-light d-flex gap-4">           
                    <a href="{{ url('/') }}">Inicio</a>
                    <div class="dropdown">
                    <a class=" dropdown-toggle-custom" type="button" data-bs-toggle="dropdown" aria-expanded="false">Productos <i class="las la-angle-down"></i></a>
                        <ul class="dropdown-menu px-3">
                            <li><a class="dropdown-item" href="{{ url('/productos/ver-todo') }}">Ver todo</a></li>
                            @foreach($categorias as $categoria)
                             <li><a class="dropdown-item" href="{{url('/productos/'.$categoria->categoria )}} ">{{$categoria->categoria}}</a></li>
                            
                           @endforeach
                        </ul>
                    </div>
                    <a href="{{ url('/sobre-nosotros') }}">Sobre nosotros</a>
                    <a href="{{ url('/contacto') }}">Contacto</a>
                    @auth
                    <a href="{{ url('/administracion/dashboard') }}">Administracion</a>
                    <form method="POST" action="/logout">
                        @csrf
                        <button class="logoutButton">Salir</button>
                    </form>    
                    @endauth
                    
                </div>

                <section class="position-relative width-search">
            <!-- Input de búsqueda -->
                    <input 
                        type="text" 
                        class="form-control mb-0 " 
                        placeholder="Buscar..." 
                        id="searchInput" 
                        autocomplete="off" 
                        oninput="filterList()"
                    >
                    <ul class="dropdown-menu bg-black width-search scroll" aria-labelledby="dropdownMenuButton1" id="dropdownMenu">
                    </ul>
                </section>
                
            </header>
            <main class="container">





