<?php

namespace App\Http\Controllers;

use App\Models\NombreLink;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index($queryLink){
        $producto = NombreLink::where('nombreLink','LiKE', $queryLink)->with("producto")->first();
        return view("producto",["producto" => $producto]);
    }
}
