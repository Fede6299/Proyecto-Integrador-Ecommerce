<?php

namespace App\Http\Controllers;

use App\Models\NombreLink;
use App\Models\Producto;
use App\Models\Galeria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index($queryLink){
        if(is_numeric($queryLink))
            $producto = Producto::where('id_mate', $queryLink)->first();
        else
            $producto = NombreLink::where('nombre_Link','LiKE', $queryLink)->with("producto")->first()->producto;
        
        $producto->imgUrls = Galeria::where('id_mate', $producto->id_mate)->pluck("imgUrl2")->toArray();
        return view("producto",["producto" => $producto]);
    }
}
