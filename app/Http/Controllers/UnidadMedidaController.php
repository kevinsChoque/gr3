<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TUm;

class UnidadMedidaController extends Controller
{
    public function actListar()
    {
    	$registros = TUm::orderBy('idUm', 'desc')->get();
        return response()->json(["data"=>$registros]);
    }
}
