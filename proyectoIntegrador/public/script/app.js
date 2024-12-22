const input = document.getElementById('searchInput')
const URL = window.location.origin;

const buscar =async (query)=>{
    try {
        const response = await fetch(`${URL}/buscar/productos/${query}`);
    const data = response.json();
    return data;
    } catch (error) {
        console.log("no se encontro", error)   
    }
    
    
}

// input.addEventListener('keyup',onchange)

const formatFromKebabCase = (str) => {
    return str.replace(/-/g, ' ').replace(/\b\w/g,char => char.toUpperCase())
}
const strToKebabCase = (str) => {
    return str.toLowerCase().trim().replace(/[^a-z0-9\s]/g, '').replace(/\s+/g,'-');
}

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
        let p = document.createElement("p")
        let img= document.createElement("img")
        img.src= `${URL}/storage/img/producto/mate.webp`
        img.classList.add("imgSearch")


        p.textContent = formatFromKebabCase(element.nombre_Link)
        p.classList.add("width-search")


        li.style.display="block"
        li.classList.add("liProduct")
        // li.classList.add("dropdown-item")
        
        li.appendChild(img)
        li.appendChild(p)
      
        dropdownMenu.appendChild(li)
        hasResults = true
    });
        dropdownMenu.style.display = hasResults ? "block" : "none";


}
dropdownMenu.addEventListener("click", (e) => {
    if (e.target.classList.contains("width-search")) {
        searchInput.value = e.target.textContent;
        dropdownMenu.style.display = "none";
        window.location = `${URL}/productos/producto/${strToKebabCase(e.target.textContent)}`
    }
});


document.addEventListener("click", (e) => {
    if (!dropdownMenu.contains(e.target) && e.target !== searchInput) {
        dropdownMenu.style.display = "none";
    }
});