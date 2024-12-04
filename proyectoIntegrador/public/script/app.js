const input = document.getElementById('searchInput')
const buscar =async (query)=>{
    try {
        const response = await fetch(`http://localhost:8000/buscar/productos/${query}`);
    const data = response.json();
    return data;
    } catch (error) {
        console.log("no se encontro", error)   
    }
    
    
}

const validador = async(e)=>{
    
    let busqueda= e.target.value;
    console.log(busqueda.trim().length);
    if(busqueda.trim().length !== 0){
        console.log( await buscar(busqueda));
    }
    
}

// input.addEventListener('keyup',onchange)

const formatFromKebabCase = (str) => {
    return str.replace(/-/g, ' ').replace(/\b\w/g,char => char.toUpperCase())
}
const strToKebabCase = (str) => {
    return str.toLowerCase().trim().replace(/[^a-z0-9\s]/g, '').replace(/\s+/g,'-');
}
//esto no queda definitivo ya que es un codigo generado por chatgpt para probar si podia hacer un dropdown con filtro
//faltaria pensar en la funcionalidad de busqueda al back 
const dropdownMenu = document.getElementById("dropdownMenu");
// const items = Array.from(dropdownMenu.querySelectorAll("li"));

const filterList = async()=> {
    const query = input.value.toLowerCase().trim().replace(/[^a-z0-9\s]/g, '').replace(/\s+/g,'-');
    console.log(query);
    const data = await buscar(query);
    console.log(data);
    let hasResults = false;
    dropdownMenu.innerHTML = ''; 

    data.forEach(element => {
        let li = document.createElement("li")
        li.textContent = formatFromKebabCase(element.nombreLink)
        li.style.display="block"
        li.classList.add("liProduct")
        dropdownMenu.appendChild(li)
        hasResults = true
    });
        dropdownMenu.style.display = hasResults ? "block" : "none";


}
dropdownMenu.addEventListener("click", (e) => {
    if (e.target.classList.contains("liProduct")) {
        searchInput.value = e.target.textContent;
        dropdownMenu.style.display = "none";
        window.location = "http://localhost:8000/productos/producto/"+strToKebabCase(e.target.textContent)
    }
});


// Filtrar las opciones del dropdown
// function filterList() {
//     const query = input.value.toLowerCase();
//     let hasResults = false;

//     items.forEach(item => {
//         const text = item.textContent.toLowerCase();
//         if (text.includes(query)) {
//             item.style.display = "block";
//             hasResults = true;
//         } else {
//             item.style.display = "none";
//         }
//     });

//     dropdownMenu.style.display = hasResults ? "block" : "none";
// }

// Seleccionar una opción del dropdown


// Ocultar la lista si haces clic fuera del dropdown o input
document.addEventListener("click", (e) => {
    if (!dropdownMenu.contains(e.target) && e.target !== searchInput) {
        dropdownMenu.style.display = "none";
    }
});