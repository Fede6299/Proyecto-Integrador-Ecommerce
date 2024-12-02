<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Storage;


class PaginaController extends Controller{
    public function index(){
        return view("principal");
    }
    public function catProductos($categoria_id){
        return view("productos",['categoria_id' => $categoria_id]);
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
