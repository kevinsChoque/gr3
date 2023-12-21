<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\TCotrecpro;

class DetalleprocotController extends Controller
{
    public function verArchivo($nombreArchivo)
    {
    	// dd($nombreArchivo);
    	$tPro = Session::get('proveedor');
    	$cadena = explode("_", $nombreArchivo);
    	$tCrp = TCotrecpro::find($cadena[0]);
        $rutaArchivo = storage_path('app/public/ofertas/'.$tCrp->idPro.'/'.$cadena[0].'/'. $nombreArchivo);
        if (file_exists($rutaArchivo)) 
            return response()->file($rutaArchivo);
        else 
            abort(404); 
    }
}
