<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Storage;


class PaginaController extends Controller{
    public function indexa(){

        return view("principal");
    }
}
