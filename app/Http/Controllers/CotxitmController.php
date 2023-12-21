<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TCotxitm;
use App\Models\TItem;

class CotxitmController extends Controller
{
    public function actGuardar(Request $r)
    {
    	$existe = TCotxitm::where('idCot',$r->idCot)->where('idItm',$r->idItm)->where('estado','1')->first();
    	if($existe == null)
    	{
    		$r->merge(['fr' => Carbon::now()]);
    		$r->merge(['estado' => '1']);
	        $tCi = TCotxitm::create($r->all());
	    	if($tCi)
	    	{
	        	$tItm = TItem::select('item.*','cotxitm.cantidad')
		            ->join('cotxitm', 'cotxitm.idItm', '=', 'item.idItm')
		            ->where('cotxitm.idCot',$r->idCot)
		            ->where('cotxitm.idItm',$r->idItm)
                    ->where('cotxitm.estado','1')
		            ->first();
	    		return response()->json(['estado' => true, 'message' => 'Item asignado correctamente', 'item' => $tItm]);
	    	}
	    	else
	    		return response()->json(['estado' => false, 'message' => 'Error al asignar el item']);
    	}
    	else
    		return response()->json(['estado' => false, 'message' => 'El item ya se encuentra dentro de la lista.']);
    }
    public function actEliminar(Request $r)
    {
        $tCi = TCotxitm::where('idCot',$r->idCot)->where('idItm',$r->idItm)->where('estado','1')->first();
        $tCi->estado = 0;
        if($tCi->save())
            return response()->json(["estado"=>true, "message"=>"Se quito el item."]);
        else
            return response()->json(["estado"=>false, "message"=>"No se pudo proceder.",]);
    }
    public function actChangeCant(Request $r)
    {
        $tCi = TCotxitm::where('idCot',$r->idCot)->where('idItm',$r->idItm)->where('estado','1')->first();
        $tCi->cantidad = $r->cant;
        if($tCi->save())
            return response()->json(["estado"=>true, "message"=>"Se agrego cant."]);
        else
            return response()->json(["estado"=>false, "message"=>"No se pudo proceder.",]);
    }
    public function actChangeUm(Request $r)
    {
        $tCi = TCotxitm::where('idCot',$r->idCot)->where('idItm',$r->idItm)->where('estado','1')->first();
        $tCi->idUm = $r->idUm;
        if($tCi->save())
            return response()->json(["estado"=>true, "message"=>"Se agrego unidad de medida."]);
        else
            return response()->json(["estado"=>false, "message"=>"No se pudo proceder.",]);
    }
    public function actLoadSegunCotizacion(Request $r)
    {
        $registros = TItem::select('item.*','cotxitm.*','unidadmedida.nombre as nombreUm')
            ->join('cotxitm', 'cotxitm.idItm', '=', 'item.idItm')
            ->leftjoin('unidadmedida', 'unidadmedida.idUm', '=', 'cotxitm.idUm')
            ->where('cotxitm.idCot',$r->idCot)
            ->where('cotxitm.estado','1')
            ->orderBy('cotxitm.idCi', 'asc')
            ->get();
        return response()->json(["data"=>$registros]);
    }
    
    
}
