<?php

use App\Http\Controllers\BuscadorController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;


// metodos get
Route::get('/',[PaginaController::class, 'index']);
Route::get('/productos/{categoria_id}',[PaginaController::class,'catProductos']);
Route::get('/sobre-nosotros', [PaginaController::class,'sobreNosotros']);
Route::get('/contacto',[PaginaController::class, 'contacto']);
Route::get('/productos/producto/{nombreLink}',[ProductoController::class,'index'] );
Route::get('/buscar/productos/{queryLink}', [BuscadorController::class,'buscarApi']);


//administracion
Route::get('/administracion/login', [PaginaController::class, 'loginAdm']);
Route::get('/administracion/registrar-usuario',[PaginaController::class,'registrar']);
Route::get('/administracion/dashboard',[PaginaController::class,'adminProductos'])->middleware("auth");
Route::get('/administracion/dashboard/crear-producto',[PaginaController::class,'crearProducto']);
Route::post('/registrar',[UsuarioController::class,'registrar']);
Route::post('/loginUser',[UsuarioController::class,'login']);
Route::post('/logout',[UsuarioController::class,'logout']);
Route::post('/crear',[UsuarioController::class,'crearProducto']);