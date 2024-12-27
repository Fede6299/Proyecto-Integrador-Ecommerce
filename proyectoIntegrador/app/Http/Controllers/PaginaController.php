<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Destacados;
use App\Models\NombreLink;
use App\Models\Producto;
use App\Models\Galeria;



class PaginaController extends Controller{
    public function index(){
        $destacados = Destacados::with("producto")->get();;
        return view("principal",["destacados" => $destacados]);
    }
    
    public function catProductos($categoria_nombre){
 
        if($categoria_nombre != "ver-todo"){
            $productos =Producto::whereHas('categorias', function ($query) use ($categoria_nombre)  {
                $query->where('categorias.categoria','LIKE', "$categoria_nombre");
            })->get();
        }else{
            $productos = Producto::with("categorias")->get();
        }

        $parametros=[
            "categoria_id" => $categoria_nombre,
            "productos" => $productos
        ];

        return view("productos", $parametros);
    }
    public function sobreNosotros(){
        return view("sobreNosotros");
    }
    public function contacto(){
        return view("contacto");
    }
    public function loginAdm(){
        return view("admin.loginAdm");
    }
    public function registrar(){
        return view("admin.registro");
    }
    public function adminProductos(){
        $productos = Producto::with("categorias")->get();
        $destacados = Destacados::all()->pluck("id_prodDest")->toArray();

        $parametros=[
            "productos" => $productos,
            "productoDestacados" => $destacados

        ];
        return view("admin.adminProducto",$parametros);
    }
    public function crearProducto(){
        $categorias = Categoria::all();
        $parametros=[

            "categoria" => $categorias
        ];
        return view("admin.crearProducto",  $parametros);
    }
    public function editarProducto(Producto $producto){
        $categorias = Categoria::all();
        $nombresSecundarias = Galeria::where('id_mate', $producto->id_mate)->pluck("imgUrl2")->toArray();

        $parametros=[
            "categoria" => $categorias,
            "categorySelected" =>$producto->categorias->pluck("id_categoria")->toArray(),
            "producto" => $producto,
            "secundariasActuales" => implode(', ', $nombresSecundarias)
        ];

        return view("admin.editarProducto",$parametros);
    }
}
