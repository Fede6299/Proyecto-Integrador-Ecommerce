<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tienda mates</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <body class="font-sans antialiased dark:bg-black dark:text-white/50">
            <header class="bg-black navbar h-100" >
                <h1 class="text-light navbar-brand ms-5 p-0">Tienda mates</h1>
                <div class="text-light d-flex gap-4">
                    <a href="/">Inicio</a>
                    <div>
                        <p>Productos</p>
                    </div>
                    <a>Sobre nosotros</a>
                    <a>Contacto</a>
                </div>
                <form class="position-relative">
            <!-- Input de búsqueda -->
                    <input 
                        type="text" 
                        class="form-control" 
                        placeholder="Buscar..." 
                        id="searchInput" 
                        autocomplete="off" 
                        oninput="filterList()"
                    >
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="dropdownMenu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </form>
                
            </header>







            
            <script>
                //esto no queda definitivo ya que es un codigo generado por chatgpt para probar si podia hacer un dropdown con filtro
                //faltaria pensar en la funcionalidad de busqueda al back 
        const searchInput = document.getElementById("searchInput");
        const dropdownMenu = document.getElementById("dropdownMenu");
        const items = Array.from(dropdownMenu.querySelectorAll("li"));

        // Filtrar las opciones del dropdown
        function filterList() {
            const query = searchInput.value.toLowerCase();
            let hasResults = false;

            items.forEach(item => {
                const text = item.textContent.toLowerCase();
                if (text.includes(query)) {
                    item.style.display = "block";
                    hasResults = true;
                } else {
                    item.style.display = "none";
                }
            });

            dropdownMenu.style.display = hasResults ? "block" : "none";
        }

        // Seleccionar una opción del dropdown
        dropdownMenu.addEventListener("click", (e) => {
            if (e.target.classList.contains("dropdown-item")) {
                searchInput.value = e.target.textContent;
                dropdownMenu.style.display = "none";
            }
        });

        // Ocultar la lista si haces clic fuera del dropdown o input
        document.addEventListener("click", (e) => {
            if (!dropdownMenu.contains(e.target) && e.target !== searchInput) {
                dropdownMenu.style.display = "none";
            }
        });
    </script>

     