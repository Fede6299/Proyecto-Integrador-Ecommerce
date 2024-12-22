<?php

namespace App\Http\Controllers;

use App\Models\NombreLink;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class UsuarioController extends Controller
{
    public function login(Request $request){
        $datos = $request->validate([
            "user_name"=>['required', 'min:3', 'max:8'],
            "password" =>['required'],
        ],
        [
            "userName.required"=>"Este campo es obligatorio" ,
            "password.required"=>"Este campo es obligatorio" ,
        ]);
        if(Auth::attempt($datos)){
            return response()->redirectTo("/administracion/dashboard")->with("success","Usuario logeado correctamente");
        }else{
            return response()->redirectTo("/")->with("fail","error no se pudo logear");
        }

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
        $datos["password"] =bcrypt( $datos["password"]) ;

        User::create($datos);
        
        return response()->redirectTo("administracion/login")->with("success","Usuario registrado correctamente");
    }
    public function logout(){
        Auth::logout();

        return response()->redirectTo("/");
    }
    public function crearProducto(Request $request){
        $datos = $request->validate([
            "descripcion" =>["required"],
            "precio"=>["required"],
            "cantidad"=> ["required"],
        ],[
            "descripcion.required" => "Este campo es obligatorio!",
            "precio.required" => "Este campo es obligatorio!",
            "cantidad.required" => "Este campo es obligatorio!",
        ]);
        $datos["estado"] = 1;
        $producto = Producto::create($datos);

        NombreLink::create([
            "nombre_Link" => Str::slug($datos["descripcion"]),
            "id_producto" => $producto->id_mate
        ]);


        return response()->redirectTo("administracion/dashboard")->with("success","Producto creado correctamente");
    }
}
