<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TItem;

class ItemController extends Controller
{
    public function actListar()
    {
    	$registros = TItem::orderBy('idItm', 'desc')->get();
        return response()->json(["data"=>$registros]);
    }
    public function actGurdar(Request $r)
    {
        $r->merge(['fr' => Carbon::now()]);
        $tItm = TItem::create($r->all()); 
    	if($tItm)
    	{
    		return response()->json(['estado' => true, 'message' => 'Item registrado correctamente', 'item' => $tItm]);
    	}
    	else
    	{
    		return response()->json(['estado' => false, 'message' => 'Error al registrar el item']);
    	}
    }
    
}
