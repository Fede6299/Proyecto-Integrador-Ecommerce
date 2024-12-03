<?php

namespace App\Http\Controllers;

use App\Models\Destacados;
use App\Models\NombreLink;
use App\Models\Producto;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PaginaController extends Controller{
    public function index(){
        $destacados = Destacados::all();
    
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
        return view("loginAdm");
    }
}
