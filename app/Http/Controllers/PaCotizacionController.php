<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\TCotizacion;
use App\Models\TProveedor;

class PaCotizacionController extends Controller
{
    public function actListar()
    {
        // select c.* from cotizacion c
        //     left join recotizacion r on c.idCot=r.idCot
        // where estadoCotizacion='2' or estadoCotizacion='5';

        // SELECT pre.idPro,c.* FROM cotizacion c 
        // left join cotrecpro pre on c.idCot=pre.idCot 
        // left join proveedor p on p.idPro=pre.idPro 
        // where c.estadoCotizacion='2' or c.estadoCotizacion='5';


    	// $registros = TCotizacion::select('cotizacion.*')
     //        // ->leftjoin('recotizacion','recotizacion.idCot','=','cotizacion.idCot')
     //        ->where('estadoCotizacion','2')
     //        ->orWhere('estadoCotizacion','5')
     //        ->orderBy('fr','desc')->get();
        $tPro = Session::get('proveedor');
        $registros = TCotizacion::select('cotizacion.*')
            // ->leftjoin('cotrecpro','cotrecpro.idCot','=','cotizacion.idCot')
            // ->where('cotrecpro.idPro','!=',$tPro->idPro)
            ->where('cotizacion.estadoCotizacion','2')
            ->orWhere('cotizacion.estadoCotizacion','5')
            ->orderBy('fr','desc')->get();

        $registros = TCotizacion::select('cotizacion.*','cotrecpro.idPro')
            ->leftjoin('cotrecpro','cotrecpro.idCot','=','cotizacion.idCot')
            ->leftjoin('proveedor','proveedor.idPro','=','cotrecpro.idPro')
            ->where('cotizacion.estadoCotizacion','2')
            ->orWhere('cotizacion.estadoCotizacion','5')
            ->orderBy('fr','desc')
            ->get();
        // $registros = TCotizacion::where('estadoCotizacion','2')->orderBy('fr','desc')->get();
        return response()->json(["data"=>$registros]);
    }
    
    public function actSearch(Request $r)
    {
    	// Tu array
		// $array = [1, 2, null, 4, null, 6];

		// Filtra los elementos nulos
		$arrayFiltrado = array_filter($r->all(), function ($ele) {
		    return $ele !== null;
		});

		// Cuenta los elementos restantes
		$elementosNoNulos = count($arrayFiltrado);

		// Imprime el resultado
		// echo "Número de elementos no nulos: $elementosNoNulos";
		// exit();
  //   	dd(gettype($r->all()));
    	
        // ------------------------------------------------------------------
        // ------------------------------------------------------------------
        // ------------------------------------------------------------------
        $tipo='';
        if($elementosNoNulos==1)
        {
            // dd('estra aki');
            if(!is_null($r->tipo) && $r->tipo!=0)
            {   
                $tipo=" AND tipo = '".$r->tipo."' ";
            }
        	$sql = "SELECT * FROM cotizacion where estadoCotizacion=2 ".$tipo;
        }
        else
        {
	        $numeroCotizacion='';
	        $concepto='';
	        $entreFechas='';
            
	        if(!is_null($r->numeroCotizacion))
	        {
	        	$numeroCotizacion=" or numeroCotizacion=".$r->numeroCotizacion;
	            // array_push($array, $r->numeroCotizacion);
	        }
	        if(!is_null($r->concepto))
	        {
	        	$concepto=" or concepto like '%".$r->concepto."%'";
	            // array_push($array, $r->concepto);
	        }
	        if(!is_null($r->fechaInicial))
	        {
	        	$entreFechas=" or ( fechaCotizacion>='".$r->fechaInicial."' and fechaFinalizacion<='".$r->fechaFinal."')";
	            // array_push($array, $r->concepto);
	        }
            if(!is_null($r->tipo) && $r->tipo!=0)
            {   
                $tipo=" AND tipo = '".$r->tipo."' ";
            }
	// SELECT * FROM cotizacion where estadoCotizacion=2 and (tipo='Bienes' or numeroCotizacion=369 or concepto like '%kevins%');-->malo
	// SELECT * FROM cotizacion where estadoCotizacion=2 and tipo='Bienes' and( numeroCotizacion=369 or concepto like '%kevins%' or (fechaCotizacion>='2023-11-08' and fechaFinalizacion<='2023-12-09'));-->MEJOR
	        // $sql = "SELECT * FROM cotizacion where estadoCotizacion=2 and ( tipo='".$r->tipo."' ".$numeroCotizacion.$concepto.')';
	        $sql = "SELECT * FROM cotizacion where (estadoCotizacion=5 or estadoCotizacion=2) ".$tipo." and ( idCot=0 ".$numeroCotizacion.$concepto.$entreFechas.')';
            // dd($sql);
        }
        // dd($sql);
        // $registros=DB::select($sql,$array);
        $registros=DB::select($sql);
        return response()->json(["data"=>$registros]);
        // return datatables()->of($registros)->toJson(); 
    }
    
    public function actShowProCot(Request $r)
    {	
    	// dd($r->all());
    	$tPro = Session::get('proveedor');
    	$tCot = TCotizacion::find($r->id);
    	$tPro = TProveedor::find($tPro->idPro);
    	return response()->json(["cot"=>$tCot,"pro"=>$tPro]);
    }
}
