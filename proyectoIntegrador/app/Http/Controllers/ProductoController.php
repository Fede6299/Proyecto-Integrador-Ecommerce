<?php

namespace App\Http\Controllers;

use App\Models\NombreLink;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index($queryLink){
        if(is_numeric($queryLink))
            $producto = Producto::where('id_producto', $queryLink)->first();
        else
            $producto = NombreLink::where('nombre_Link','LiKE', $queryLink)->with("producto")->first()->producto;
        $producto->imgUrls = array("1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg", "6.jpg", "7.jpg"); //TODO
        return view("producto",["producto" => $producto]);
    }
}
