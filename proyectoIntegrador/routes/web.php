<?php

use App\Http\Controllers\PaginaController;
use Illuminate\Support\Facades\Route;


// metodos get
Route::get('/',[PaginaController::class, 'index']);
Route::get('/productos',[PaginaController::class,'catProductos']);
Route::get('/sobre-nosotros', [PaginaController::class,'sobreNosotros']);
Route::get('/contacto',[PaginaController::class, 'contacto']);
Route::get('/administraion/login', [PaginaController::class, 'loginAdm']);

