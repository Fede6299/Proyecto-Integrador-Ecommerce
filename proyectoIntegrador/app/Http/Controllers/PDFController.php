<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    public function descargarPdf($nombre){
        $path = 'pdf/'.$nombre.'.pdf';
        if(!Storage::disk('public')->exists($path)){
            abort(404,'No se encontro el archivo');
        }
        return Storage::disk('public')->download($path);
    }
}
