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


const formatFromKebabCase = (str) => {
    return str.replace(/-/g, ' ').replace(/\b\w/g,char => char.toUpperCase())
}
const strToKebabCase = (str) => {
    return str.toLowerCase().trim().replace(/[^a-z0-9\s]/g, '').replace(/\s+/g,'-');
}

const dropdownMenu = document.getElementById("dropdownMenu");

const filterList = async()=> {
    const input = document.getElementById('searchInput')

    const query = input.value.toLowerCase().trim().replace(/[^a-z0-9\s]/g, '').replace(/\s+/g,'-');
    const data = await buscar(query);
    let hasResults = false;
    dropdownMenu.innerHTML = ''; 

    data.forEach(element => {
        let li = document.createElement("li")
        let p = document.createElement("p")
        let img= document.createElement("img")
        img.src= `${URL}/storage/${element.producto.imgUrl}`

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



function displaySelectedImage(event, elementId) {
    const selectedImage = document.getElementById(elementId);
    const fileInput = event.target;
    
    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();
    
        reader.onload = function(e) {
            selectedImage.src = e.target.result;
        };
    
        reader.readAsDataURL(fileInput.files[0]);
    }
    }


    const apiDest = ( url, id)=> {
        fetch(url,{
            method:'POST',
            headers:{
                'Content-Type':'application/json',
                'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').content
            },
            body:JSON.stringify({id:id})
        }).then(res => res.json()).then(data => console.log(data))
    }
    let count = 0;
document.querySelectorAll('.custom-control-check').forEach(check => {
    

    check.addEventListener('change',()=>{

        const id = check.getAttribute('data-id')

        if(check.checked){
            
            if(count < 4){
                apiDest('/check-dest',id)
                count++;
            } else{
                check.checked = false;
                alert("Solo puedes seleccionar 4 productos")
            }
            
        }else {
                apiDest('/check-dest-delete',id)
                count--;
        }
        
    })
    if(check.checked){
        count++;
    }
    
})



const buscarProductoAdmin = (e) =>{
    e.preventDefault();
    let input = document.getElementById("inputBuscarId").value;

    const query = input.toLowerCase().trim().replace(/[^a-z0-9\s]/g, '').replace(/\s+/g,'-');

    const form = e.target;
    if(query){
        form.action = `${URL}/administracion/dashboard/buscar/${query}`;
    }else if(query === ''){
        form.action = `${URL}/administracion/dashboard`;
    }
    form.submit();


}


