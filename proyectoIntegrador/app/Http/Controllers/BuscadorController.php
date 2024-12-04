<?php

namespace App\Http\Controllers;

use App\Models\NombreLink;
use App\Models\Producto;
use Illuminate\Http\Request;

class BuscadorController extends Controller
{
    public function buscarApi ($queryLink){

        $productosBusqueda = NombreLink::where('nombreLink', 'LiKE' ,"%$queryLink%")->get();
        
        return response()->json($productosBusqueda);
    }
}
