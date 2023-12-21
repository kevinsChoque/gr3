<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
// use Carbon\Carbon;

use App\Models\TCotizacion;

class PostulacionesController extends Controller
{
    public function actListar()
    {
		$registros = TCotizacion::select('cotizacion.idCot',
				'cotizacion.numeroCotizacion',
				'cotizacion.tipo',
				'cotizacion.concepto',
				'cotizacion.estadoCotizacion',
				'cotizacion.fechaCotizacion',
				'cotizacion.fechaFinalizacion',
				DB::raw('count(crp.idCot) as cantidad')
			)
            ->join('cotrecpro as crp', 'crp.idCot', '=', 'cotizacion.idCot')
            ->groupBy('crp.idCot',
            	'cotizacion.idCot',
            	'cotizacion.tipo',
            	'cotizacion.concepto',
				'cotizacion.estadoCotizacion',
				'cotizacion.fechaCotizacion',
				'cotizacion.fechaFinalizacion',
            	'cotizacion.numeroCotizacion'
            )
            ->where('cotizacion.estadoCotizacion','3')
            ->orderBy('cotizacion.idCot', 'desc')
            ->get();
            // dd(json_encode($registros));
        return response()->json(["data"=>$registros]);
    }
    public function actShowPostulantes(Request $r)
    {
  //   	SELECT c.timeEntrega,c.timeValidez,c.dedica,c.timeGarantia,
		// 	c.estadoCrp,c.fr,p.tipoPersona,p.razonSocial,p.nombre,p.apellidoPaterno,p.apellidoMaterno,
		// 	c.idPro,c.idCot,i.idItm,i.nombre,ci.idUm,ci.cantidad,d.marca,d.modelo,d.precio FROM cotrecpro c
		// 	inner join proveedor p on p.idPro=c.idPro
		//     inner join detalleprocot d on d.idCrp=c.idCrp
		//     inner join cotxitm ci on ci.idCi=d.idItm
		//     inner join item i on i.idItm=ci.idItm
		// where c.idCot=22;
		// dd($r->all());
		$registros = DB::table('cotrecpro as c')
		    ->select(
		    	'c.idCrp',
		        'c.timeEntrega',
		        'c.timeValidez',
		        'c.dedica',
		        'c.timeGarantia',
		        'c.estadoCrp',
		        'c.archivo',
		        'c.total',
		        'c.fr',
		        'p.tipoPersona',
		        'p.razonSocial',
		        'p.nombre as nombrePro',
		        'p.apellidoPaterno',
		        'p.apellidoMaterno',
		        'c.idPro',
		        'c.idCot',
		        'i.idItm',
		        'i.nombre',
		        'ci.idUm',
		        'ci.cantidad',
		        'd.marca',
		        'd.modelo',
		        'd.precio',
		        'd.archivo as arcDet',
		        'u.nombre as umn'
		    )
		    ->join('proveedor as p', 'p.idPro', '=', 'c.idPro')
		    ->join('detalleprocot as d', 'd.idCrp', '=', 'c.idCrp')
		    ->join('cotxitm as ci', 'ci.idCi', '=', 'd.idItm')
		    ->join('unidadmedida as u', 'u.idUm', '=', 'ci.idUm')//cascas
		    ->join('item as i', 'i.idItm', '=', 'ci.idItm')
		    ->where('c.idCot', $r->id)
		    ->get();
		return response()->json(["data"=>$registros]);
    }
}
