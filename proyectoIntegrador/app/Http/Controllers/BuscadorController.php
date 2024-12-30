<?php

namespace App\Http\Controllers;

use App\Models\Destacados;
use App\Models\NombreLink;
use App\Models\Producto;
use Illuminate\Http\Request;

class BuscadorController extends Controller
{
    public function buscarApi ($queryLink){

        $productosBusqueda = NombreLink::where('nombre_Link', 'LiKE' ,"%$queryLink%")->whereHas('producto', function ($query){
            $query->where('eliminado', 0)->where('estado', 1);
        })->with("producto")->get();
        
        return response()->json($productosBusqueda);
    }
    public function buscarTabla($queryLink){
        $productos = NombreLink::where('nombre_Link', 'LIKE', "%$queryLink%")->whereHas('producto', function ($query){
            $query->where('eliminado', 0);
        })->with(['producto.categorias'])->get();
        $destacados = Destacados::all()->pluck("id_prodDest")->toArray();
        $productosS = $productos->pluck("producto");
        // var_dump($productosS);
        $parametros=[
            "productos" => $productosS,
            "productoDestacados" => $destacados

        ];
        return view('admin.adminProducto',$parametros);
    }
}
