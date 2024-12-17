<?php

namespace App\Http\Controllers;

use App\Models\NombreLink;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index($queryLink){
        if(is_numeric($queryLink))
            $producto = Producto::where('id_mate', $queryLink)->first();
        else
            $producto = NombreLink::where('nombreLink','LiKE', $queryLink)->with("producto")->first()->producto;
        return view("producto",["producto" => $producto]);
    }
}
