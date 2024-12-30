<?php

namespace App\Http\Controllers;

use App\Mail\PostCreateMail;
use App\Models\Categoria;
use App\Models\Destacados;
use App\Models\Producto;
use App\Models\Galeria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaginaController extends Controller{
    public function index(){
        $destacados = Destacados::with("producto")->get();
        $ids = [1, 3, 4, 5];
        $categoriasIndex = Categoria::whereIn('id_categoria', $ids)
            ->take(4)
            ->get();
        $categorias= Categoria::all();
        $parametros=[
            "destacados" => $destacados,
            "categoriasIndex" => $categoriasIndex,
            "categorias" => $categorias
        ];
        return view("principal", $parametros);
    }
    
    public function catProductos($categoria_nombre){
        if($categoria_nombre != "ver-todo"){
            $productos = Producto::where('eliminado', 0)
            ->where('estado',1)->whereHas('categorias', function ($query) use ($categoria_nombre) {
                $query->where('categorias.categoria','LIKE', "$categoria_nombre");
            })->paginate(8);
        } else {
            $productos = Producto::where('eliminado', 0)->where('estado',1)
            ->with("categorias")
            ->paginate(8);
        }

        $parametros = [
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
        $productos = Producto::where('eliminado', 0)->with("categorias")->get();
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
            "secundariasActuales" => $nombresSecundarias
        ];

        return view("admin.editarProducto",$parametros);
    }
    public function enviarContacto (Request $request){
        

        $datos = [
            "nombre"=> $request->nombre,
            "apellido"=>$request->apellido,
            "telefono"=>$request->telefono,
            "email"=> $request->email,
            "comentario"=> $request->comentario,
        ];
        Mail::to('administracion@correo.com')->send(new PostCreateMail($datos));
        return redirect()->back()->with('success', 'Correo enviado correctamente.');
    }

}