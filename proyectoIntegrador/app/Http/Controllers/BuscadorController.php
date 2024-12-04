<?php

namespace App\Http\Controllers;

use App\Models\NombreLink;
use App\Models\Producto;
use Illuminate\Http\Request;

class BuscadorController extends Controller
{
    public function buscarApi ($queryLink){

        $productosBusqueda = NombreLink::whereHas('producto', function($query) use ($queryLink){
            $query->where('nombreLink', 'LiKE' ,"%$queryLink%");
        } )->with('producto')->get();
        
        return response()->json($productosBusqueda);
    }
}
