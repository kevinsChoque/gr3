<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
// use Carbon\Carbon;

use App\Models\TCotizacion;
use App\Models\TCotrecpro;

class PostulacionesController extends Controller
{
	public function actVerFile(Request $r)
    {
        $archivoPdf = TCotrecpro::find($r->idCrp)->archivoPdf;
        $file = $this->desencriptarDeepFile($archivoPdf);
        return response()->json(['estado' => true, 'file' => $file ]);
    }
	public function actVer(Request $r)
	{
		$this->historial($r);
		return view('postulacion.ver');
	}
    public function actListar()
    {
    	// dd('esteeeeeeeeeee');
		$registros = TCotizacion::select('cotizacion.idCot',
				'cotizacion.numeroCotizacion',
				'cotizacion.tipo',
				'cotizacion.concepto',
				'cotizacion.estadoCotizacion',
				'cotizacion.fechaCotizacion',
				'cotizacion.fechaFinalizacion',
				'cotizacion.horaFinalizacion',
				DB::raw('count(crp.idCot) as cantidad')
			)
            ->leftjoin('cotrecpro as crp', 'crp.idCot', '=', 'cotizacion.idCot')
            ->groupBy('crp.idCot',
            	'cotizacion.idCot',
            	'cotizacion.tipo',
            	'cotizacion.concepto',
				'cotizacion.estadoCotizacion',
				'cotizacion.fechaCotizacion',
				'cotizacion.fechaFinalizacion',
				'cotizacion.horaFinalizacion',
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
		        'c.archivoPdf',
		        'c.total',
		        'c.fr',
		        'p.tipoPersona',
		        'p.razonSocial',
		        'p.nombre as nombrePro',
		        'p.apellidoPaterno',
		        'p.apellidoMaterno',
		        'c.idPro',
		        'c.idCot',
		        // 'i.idItm',
		        // 'i.nombre',
		        'ci.idUm',
		        'ci.cantidad',
		        'ci.nombre as nombreItem',
		        'ci.um as umItem',
		        'd.marca',
		        'd.modelo',
		        'd.precio',
		        'd.archivo as arcDet',
		        // 'u.nombre as umn'
		    )
		    ->leftjoin('proveedor as p', 'p.idPro', '=', 'c.idPro')
		    ->leftjoin('detalleprocot as d', 'd.idCrp', '=', 'c.idCrp')
		    ->leftjoin('cotxitm as ci', 'ci.idCi', '=', 'd.idItm')
		    // ->join('unidadmedida as u', 'u.idUm', '=', 'ci.idUm')//cascas
		    // ->join('item as i', 'i.idItm', '=', 'ci.idItm')
		    ->where('c.idCot', strval($r->id))
		    ->get();
		// dd($registros);
        for ($i = 0; $i < count($registros); $i++) 
        {   
        	$registros[$i]->total = $this->encryp_mount($registros[$i]->total);
        	$registros[$i]->timeEntrega = $this->encryp_mount($registros[$i]->timeEntrega);
        	$registros[$i]->timeValidez = $this->encryp_mount($registros[$i]->timeValidez);
        	$registros[$i]->marca = empty($registros[$i]->marca)?'-':$this->encryp_mount($registros[$i]->marca);
        	$registros[$i]->modelo = empty($registros[$i]->modelo)?'-':$this->encryp_mount($registros[$i]->modelo);
        	$registros[$i]->precio = $this->encryp_mount($registros[$i]->precio);
        }
		$tCot = TCotizacion::find($r->id);
		$r['hidCot'] = $tCot->idCot;
        $r['hnumeroCotizacion'] = $tCot->numeroCotizacion;
        $r['hnumeroCotizacion'] = " <b>(".$tCot->numeroCotizacion.")</b>";
        $this->historial($r);
        // dd($registros);
		return response()->json(["data"=>$registros]);
    }
}
