<?php

namespace App\Http\Controllers;

use App\Models\NombreLink;
use App\Models\Producto;
use App\Models\User;
use App\Models\Galeria;
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
            return response()->redirectTo("/administracion/dashboard");
        }else{
            return response()->redirectTo("/administracion/login")->with("fail","error no se pudo logear");
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
            "categorias" => ["nullable","array"],
        ],[
            "descripcion.required" => "Este campo es obligatorio!",
            "precio.required" => "Este campo es obligatorio!",
            "cantidad.required" => "Este campo es obligatorio!",
        ]);


        $file = $request->file("imagenPrincipal");
        if($file){
            $nombre = time()."_".$file->getClientOriginalName();
            $fileParth = $file->storeAs("img", $nombre,'public');
            $datos["imgUrl"] = $fileParth;
        }


        $datos["eliminado"] = 0;

        $datos["estado"] = 1;
        $producto = Producto::create($datos);

        $filesSecundarias = $request->file("imagenesSecundarias");
        if($filesSecundarias){
            foreach ($filesSecundarias as $file) {
                $nombre = time() . "_" . $file->getClientOriginalName();
                $filePath = $file->storeAs("img/producto/" . $producto->id_mate, $nombre, 'public');
                Galeria::create(['id_mate' => $producto->id_mate, 'imgUrl2' => $nombre]);
            }
        }

        NombreLink::create([
             "nombre_Link" => Str::slug($datos["descripcion"]),
            "id_producto" => $producto->id_mate
        ]);
        $producto->categorias()->attach($datos["categorias"]?? []);


        return response()->redirectTo("administracion/dashboard")->with("success","Producto creado correctamente");
    }
    public function editarProducto(Producto $producto, Request $request){
        $datos = $request->validate([
            "descripcion" =>["required"],
            "precio"=>["required"],
            "cantidad"=> ["required"],
           "estado" => ["required"],
           "categorias" => ["nullable","array"],
        ],[
            "descripcion.required" => "Este campo es obligatorio!",
            "precio.required" => "Este campo es obligatorio!",
            "cantidad.required" => "Este campo es obligatorio!",
        ]);
        $producto->descripcion = $datos["descripcion"];
        $producto->estado = $datos["estado"];
        $producto->precio = $datos["precio"];
        $producto->cantidad = $datos["cantidad"];
        $producto->categorias()->sync($datos["categorias"] ?? []);
        
        

        $file = $request->file("imagenPrincipal");
        if($file){
            if($producto->imgUrl){
                if (file_exists(public_path("storage/".$producto->imgUrl))) {
                    unlink(public_path("storage/".$producto->imgUrl));
                }
            }
            $nombre = time()."_".$file->getClientOriginalName();
            $fileParth = $file->storeAs("img", $nombre,'public');


            $producto->imgUrl= $fileParth;

        }

        $filesSecundarias = $request->file("imagenesSecundarias");
        if($filesSecundarias){
            foreach ($filesSecundarias as $file) {
                $nombre = time() . "_" . $file->getClientOriginalName();
                $filePath = $file->storeAs("img/producto/" . $producto->id_mate, $nombre, 'public');
                Galeria::create(['id_mate' => $producto->id_mate, 'imgUrl2' => $nombre]);
            }
        }
        
        $producto->save();
        return redirect("/administracion/dashboard")->with("success", "Se actualizo el producto de forma correcta");
    }
    public function eliminarProducto(Producto $producto, Request $request){
        $producto->eliminado = 1;
        $producto->save();
        return redirect("/administracion/dashboard")->with("success", "Se elimino el producto de forma correcta");
    }

    public function eliminarImagen(Int $productoid, Int $imagenid, Request $request){
        $responseDB = Galeria::destroy($imagenid);
        if ($responseDB) {
            return response()->json([
                'status' => 1,
                'msg' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'msg' => 'fail'
            ]);
        }
        //$path = 'storage/img/producto/' . $productoid . '/' . $item->imgUrl2;
        //TODO elimiar imagen del filesystem
        return redirect("/administracion/dashboard")->with("success", "Se elimino el producto de forma correcta");
    }
}
