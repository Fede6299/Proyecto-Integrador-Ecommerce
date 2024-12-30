<?php

use App\Http\Controllers\BuscadorController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\PDFController;
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
Route::get('/buscar/tablaProductos/{queryLink}', [BuscadorController::class,'buscarTabla']);
Route::post('/enviarContacto',[PaginaController::class,'enviarContacto']);
Route::get('/descargar/{nombre}',[PDFController::class,'descargarPdf']);



//administracion
Route::get('/administracion/login', [PaginaController::class, 'loginAdm']);
Route::get('/administracion/registrar-usuario',[PaginaController::class,'registrar']);
Route::get('/administracion/dashboard',[PaginaController::class,'adminProductos'])->middleware("auth");
Route::get('/administracion/dashboard/buscar/{queryLink}', [BuscadorController::class,'buscarTabla']);
Route::get('/administracion/dashboard/crear-producto',[PaginaController::class,'crearProducto'])->middleware("auth");
Route::get('/administracion/dashboard/{producto}/editar-producto',[PaginaController::class,'editarProducto'])->middleware("auth");

Route::post('/registrar',[UsuarioController::class,'registrar']);
Route::post('/loginUser',[UsuarioController::class,'login']);
Route::post('/logout',[UsuarioController::class,'logout']);
Route::post('/crear',[UsuarioController::class,'crearProducto']);
Route::put('/editar/{producto}', [UsuarioController::class, 'editarProducto']);
Route::put("/producto/eliminar/{producto}", [UsuarioController::class, 'eliminarProducto']);
Route::delete("/producto/{productoid}/imagen/{imagenid}", [UsuarioController::class, 'eliminarImagen']);
Route::post('/check-dest',[CheckController::class,'check']);
Route::post('/check-dest-delete',[CheckController::class,'checkdelete']);


