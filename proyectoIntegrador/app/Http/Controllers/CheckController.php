<?php

namespace App\Http\Controllers;

use App\Models\Destacados;
use Illuminate\Http\Request;
use Laravel\Pail\ValueObjects\Origin\Console;

class CheckController extends Controller
{
    public function check(Request $request){

        Destacados::create([
            'id_prodDest'=> $request->id
        ]);
        return response()->json(['success' => true, 'message' => 'Registro creado exitosamente']);
    }
    public function checkdelete(Request $request){
        
       $state = Destacados::where('id_prodDest',$request->id);
       if($state){
        $state->delete();
       }
        return response()->json(['success' => true, 'message' => 'Registro borrado exitosamente']);
    }
}
