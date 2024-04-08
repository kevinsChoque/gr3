<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\TCotxitm;

class ItemSigaController extends Controller
{
    public function actSearch(Request $r)
    {
    	// dd('aki te envio',$r->documento);
    	$serverName = '10.19.0.3';
    	$serverName = 'localhost';
		$connectionInfo = array("Database"=>"SIGA","UID"=>"sis_coti","PWD"=>"Admin@2026","CharacterSet"=>"UTF-8");
		$connectionInfo = array("Database"=>"Amigos","UID"=>"kevins","PWD"=>"@emusap1@","CharacterSet"=>"UTF-8");

		$conn_sis = sqlsrv_connect($serverName,$connectionInfo);
		if($conn_sis)
		{
			
			$script = "select NOMBRE_ITEM AS 'nombre',CANTIDAD as 'cantidad',um.NOMBRE AS 'um' from UNIDAD_MEDIDA um
				inner join SIG_PAAC_ITEM pit on um.UNIDAD_MEDIDA = pit.UNIDAD_MEDIDA
				inner join CATALOGO_BIEN_SERV_ORIGINAL cbs on pit.GRUPO_BIEN=cbs.GRUPO_BIEN and pit.CLASE_BIEN=cbs.CLASE_BIEN and pit.FAMILIA_BIEN = cbs.FAMILIA_BIEN and pit.ITEM_BIEN =cbs.ITEM_BIEN
				where ANO_EJE= 2024 and NRO_CONSOLID=".$r->documento;  
			$script = "select * from items where pedido=".$r->documento;
			$stmt = sqlsrv_query($conn_sis, $script); 
			$arreglo = array(); 
			$html='';
			// dd('entro aki');
			while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) 
			{
			    $arreglo[] = $row;
			}
			// dd($sql);
			// $sql = "select * from items where pedido=".$r->documento;
			// $arreglo=DB::select($sql);
			// dd($arreglo);
			return response()->json(['estado' => true,"data"=>$arreglo]);
		}
		else
		{
			// dd("fallo");
			// die(print_r(sqlsrv_errors(),true));
			return response()->json(['estado' => false, 'message' => 'No se pudo conectar al servidor de la SIGA.']);
		}
    }
    public function actShowItems(Request $r)
    {
    	$registros = TCotxitm::where('idCot',$r->idCot)
            ->orderBy('fr', 'asc')
            ->get();
        return response()->json(['estado' => true,"data"=>$registros]);
    }
}
