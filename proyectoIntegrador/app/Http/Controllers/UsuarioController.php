<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function login(Request $request){
        return response()->redirectTo("/");
    }
    public function registrar(Request $request){
        $datos = $request->validate([
            "nombre" =>['required'],
            "apellido" =>['required'],
            "user_name"=>['required', 'min:3', 'max:8'],
            "password" =>['required','confirmed'],
            "email"=>['required'],
        ],
        [
           "nombre.required"=>"Este campo es obligatorio" ,
           "apellido.required"=>"Este campo es obligatorio" ,
           "userName.required"=>"Este campo es obligatorio" ,
           "userName.min" =>"Este campo necesita un minimo de 3 caracteres",
           "userName.max" =>"Este campo neceista un maximo de 8 caracteres",
           "password.required"=>"Este campo es obligatorio" ,
           "email.required"=>"Este campo es obligatorio" 
        ]);
        User::create($datos);
        
        return response()->redirectTo("administracion/login")->with("success","Usuario registrado correctamente");
    }
}
