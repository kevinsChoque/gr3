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
        // envia solo las cotizaciones que solo estan en proceso o recotizando
        $tPro = Session::get('proveedor');
        $registros = TCotizacion::select('cotizacion.*')
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
        return response()->json(["data"=>$registros]);
    }
    public function actListarPortal()
    {
        $registros = TCotizacion::select('cotizacion.*')
            ->where('cotizacion.estadoCotizacion','2')
            ->orWhere('cotizacion.estadoCotizacion','5')
            ->orderBy('fr','desc')
            ->get();
        return response()->json(["data"=>$registros]);
    }
    
    public function actSearch(Request $r)
    {
        // busca las cotizaciones que solo estan en proceso o recotizando segun las opciones enviadas en el request
		$arrayFiltrado = array_filter($r->all(), function ($ele) {
		    return $ele !== null;
		});
		// cuenta si se envio alguna opcion de filtrado
		$elementosNoNulos = count($arrayFiltrado);
        $tipo='';
        if($elementosNoNulos==1)
        {
            // si no se envio datos para filtrar enviamos por defecto las cotizaciones publicadas
            if(!is_null($r->tipo) && $r->tipo!=0)
            {   $tipo=" AND tipo = '".$r->tipo."' ";}
        	$sql = "SELECT * FROM cotizacion where estadoCotizacion=2 ".$tipo;
        }
        else
        {
            // en caso envio los datos de filtrado, se comienza a crear la consulta con estos datos
	        $numeroCotizacion='';
	        $concepto='';
	        $entreFechas='';
            
	        if(!is_null($r->numeroCotizacion))
	        {  $numeroCotizacion=" or numeroCotizacion=".$r->numeroCotizacion;}
	        if(!is_null($r->concepto))
	        {  $concepto=" or concepto like '%".$r->concepto."%'";}
	        if(!is_null($r->fechaInicial))
	        {  $entreFechas=" or ( fechaCotizacion>='".$r->fechaInicial."' and fechaFinalizacion<='".$r->fechaFinal."')";}
            if(!is_null($r->tipo) && $r->tipo!=0)
            {   $tipo=" AND tipo = '".$r->tipo."' ";}
	        $sql = "SELECT * FROM cotizacion where (estadoCotizacion=5 or estadoCotizacion=2) ".$tipo." and ( idCot=0 ".$numeroCotizacion.$concepto.$entreFechas.')';
        }
        $registros=DB::select($sql);
        return response()->json(["data"=>$registros]);
    }
    public function actSearchPortal(Request $r)
    {
        $arrayFiltrado = array_filter($r->all(), function ($ele) {
            return $ele !== null;
        });
        // cuenta si se envio alguna opcion de filtrado
        $elementosNoNulos = count($arrayFiltrado);
        $tipo='';
        if($elementosNoNulos==1)
        {
            // si no se envio datos para filtrar enviamos por defecto las cotizaciones publicadas
            if(!is_null($r->tipo) && $r->tipo!=0)
            {   $tipo=" AND tipo = '".$r->tipo."' ";}
            $sql = "SELECT * FROM cotizacion where estadoCotizacion=2 ".$tipo;
        }
        else
        {
            // en caso envio los datos de filtrado, se comienza a crear la consulta con estos datos
            $numeroCotizacion='';
            $concepto='';
            $entreFechas='';
            if(!is_null($r->cadena))
            {   $numeroCotizacion=" or numeroCotizacion=".$r->cadena;}
            if(!is_null($r->cadena))
            {   $concepto=" or concepto like '%".$r->cadena."%'";}
            if(!is_null($r->fechaInicial))
            {   $entreFechas=" or ( fechaCotizacion>='".$r->fechaInicial."' and fechaFinalizacion<='".$r->fechaFinal."')";}
            if(!is_null($r->tipo) && $r->tipo!=0)
            {   $tipo=" AND tipo = '".$r->tipo."' ";}
            $sql = "SELECT * FROM cotizacion where (estadoCotizacion=5 or estadoCotizacion=2) ".$tipo." and ( idCot=0 ".$numeroCotizacion.$concepto.$entreFechas.')';
        }
        $registros=DB::select($sql);
        return response()->json(["data"=>$registros]);
    }
    public function actShowProCot(Request $r)
    {	
    	$tPro = Session::get('proveedor');
    	$tCot = TCotizacion::find($r->id);
    	$tPro = TProveedor::find($tPro->idPro);
    	return response()->json(["cot"=>$tCot,"pro"=>$tPro]);
    }
}
