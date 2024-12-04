<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index($queryLink){
        return view("producto",["queryLink" => $queryLink]);
    }
}
