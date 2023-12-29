<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\TCotizacion;
use App\Models\TProveedor;
use App\Models\TUsuario;

class HomeAdminController extends Controller
{
    public function actDatos()
    {
    	$cCotizaciones = TCotizacion::count();
    	$cProveedores = TProveedor::count();
    	$cCotizadores = TUsuario::where('tipo','cotizador')->where('estado','1')->get()->count();
    	$cBienes = TCotizacion::where('tipo','Bienes')->where('estado','1')->get()->count();
    	$cServicios = TCotizacion::where('tipo','Servicios')->where('estado','1')->get()->count();
    	return response()->json([
    		"cCot"=>$cCotizaciones,
    		"cPro"=>$cProveedores,
    		"cCoti"=>$cCotizadores,
    		"cBie"=>$cBienes,
    		"cSer"=>$cServicios,
    	]);
    }
    public function actCantCotEstadoMes()
    {
		$ultimoMes = now()->format('Y-m'); // Obtener el formato 'YYYY-MM' del mes actual
		/*
		*	segun los estados con las q se tomo en cuenta son 
		*	en proceso = 1
		*	publicado = 2
		*	finalizado = 3
		*	recotizando = 5
		*/
		$enProceso = TCotizacion::select('estadoCotizacion', DB::raw('COUNT(*) as cantidad'))
		    ->where(DB::raw('MONTH(fr)'), '=', date('m', strtotime($ultimoMes))) //se verifica la fecha de registro deacuerdo al ultimo mes
		    ->where(DB::raw('YEAR(fr)'), '=', date('Y', strtotime($ultimoMes))) //se verifica la fecha de registro deacuerdo al ultimo año
		    ->where('estadoCotizacion','1')
		    ->groupBy('estadoCotizacion')
		    ->first();
		$publicado = TCotizacion::select('estadoCotizacion', DB::raw('COUNT(*) as cantidad'))
		    ->where(DB::raw('MONTH(fr)'), '=', date('m', strtotime($ultimoMes)))
		    ->where(DB::raw('YEAR(fr)'), '=', date('Y', strtotime($ultimoMes)))
		    ->where('estadoCotizacion','2')
		    ->groupBy('estadoCotizacion')
		    ->first();
		$finalizado = TCotizacion::select('estadoCotizacion', DB::raw('COUNT(*) as cantidad'))
		    ->where(DB::raw('MONTH(fr)'), '=', date('m', strtotime($ultimoMes)))
		    ->where(DB::raw('YEAR(fr)'), '=', date('Y', strtotime($ultimoMes)))
		    ->where('estadoCotizacion','3')
		    ->groupBy('estadoCotizacion')
		    ->first();
		$recotizando = TCotizacion::select('estadoCotizacion', DB::raw('COUNT(*) as cantidad'))
		    ->where(DB::raw('MONTH(fr)'), '=', date('m', strtotime($ultimoMes)))
		    ->where(DB::raw('YEAR(fr)'), '=', date('Y', strtotime($ultimoMes)))
		    ->where('estadoCotizacion','5')
		    ->groupBy('estadoCotizacion')
		    ->first();
		$estados = ["EN PROCESO","PUBLICADO","FINALIZADO","RECOTIZANDO"];
		// en caso no contemos registros con el tipo de cotizacion q solicitamos en la consulta se llena con 0
		$valores = [
			$enProceso===null?'0':$enProceso->cantidad,
			$publicado===null?'0':$publicado->cantidad,
			$finalizado===null?'0':$finalizado->cantidad,
			$recotizando===null?'0':$recotizando->cantidad,
		];
		// se crea el formato en json para el grafico conjuntamente seteando los arrays
		$datos = [
	        'labels' => $estados,
	        'datasets' => [
	        	[
	        		'data' => $valores,
	        		'backgroundColor' => ['rgba(255, 99, 132, 0.5)', 
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(66, 99, 132, 0.5)',
                        'rgba(34, 99, 1, 0.5)'
                    ], 
                    'borderColor' => ['rgba(255, 99, 132, 1)', 
                        'rgba(54, 162, 235, 1)',
                        'rgba(66, 99, 132, 0.5)',
                        'rgba(34, 99, 1, 0.5)'
                    ],
                    'borderWidth' => 1
	        	],
	        ]
	    ];
	    return response()->json($datos);
    }
	public function actMontoCotSegunTipoMes()
	{
		// cantidad de cotizaciones segun el tipo(bienes, servicios), tomando en cuenta los ultimos 6 mese
		$resultados = DB::table('cotizacion')
		    ->selectRaw('YEAR(fr) AS anio, MONTH(fr) AS mes, COALESCE(COUNT(*), 0) AS cantidad')
		    ->where('fr', '>=', now()->subMonths(6))
		    ->where('tipo', 'Bienes')
		    ->groupBy('anio', 'mes')
		    ->orderBy('anio', 'asc')
		    ->orderBy('mes', 'asc')
		    ->get();
		$resultados2 = DB::table('cotizacion')
		    ->selectRaw('YEAR(fr) AS anio, MONTH(fr) AS mes, COALESCE(COUNT(*), 0) AS cantidad')
		    ->where('fr', '>=', now()->subMonths(6))
		    ->where('tipo', 'Servicios')
		    ->groupBy('anio', 'mes')
		    ->orderBy('anio', 'asc')
		    ->orderBy('mes', 'asc')
		    ->get();

		/*
		*	se crean los array con el siguiente formato ($arrayClaveValor['2023-12']) para su uso y creacion de los objetos
		*	en donde el primer valor es el año y el segundo el mes, cada elemento guardara la cantidad de coti. q se tenga en ese mes
		*/
		$arrayClaveValor = [];
		foreach ($resultados as $item) {
		    $clave = $item->anio .'-'. $item->mes;
		    $arrayClaveValor[$clave] = $item->cantidad;
		}
		$arrayClaveValor2 = [];
		foreach ($resultados2 as $item) {
		    $clave = $item->anio .'-'. $item->mes;
		    $arrayClaveValor2[$clave] = $item->cantidad;
		}
		// se captura la fecha actual y se inicializa CARBON para su facil uso
		$fechaActual = Carbon::now();
		$fechaActual2 = Carbon::now();
		// Array para almacenar los 6 últimos meses
		$ultimosSeisMeses = [];
		// primer grafico de barras para bienes
		$valoresGrafico = [];
		// segundo grafico de barras para servicios
		$valoresGrafico2 = [];
		// los ultimos 6 meses para las etiquetas del grafico o objeto
		$meses = [];
		// Bucle para obtener los 6 últimos meses
		for ($i = 0; $i < 6; $i++) 
		{
			// valores de la cantidad segun el mes de los bienes
			$valoresGrafico[] = isset($arrayClaveValor[$fechaActual->format('Y-n')]) ? 
				$arrayClaveValor[$fechaActual->format('Y-n')]:
				'0';
		    $meses[] = $fechaActual->format('Y-n');
		    // Agregar el mes al array en el formato deseado
		    $ultimosSeisMeses[] = $fechaActual->format('Y-n');
		    // Retroceder un mes para la siguiente iteracion
		    $fechaActual->subMonth();
		}
		for ($i = 0; $i < 6; $i++) 
		{
			// valores de la cantidad segun el mes de los servicios
			$valoresGrafico2[] = isset($arrayClaveValor2[$fechaActual2->format('Y-n')]) ? 
				$arrayClaveValor2[$fechaActual2->format('Y-n')]:
				'0';
			// Retroceder un mes para la siguiente iteracion
		    $fechaActual2->subMonth();
		}
		// creacion del objeto con los 2 datasets que se crearon con los 2 ultimos bucles
		// objeto que servira`para la creacion de los graficos de barras
	    $datos = [
	        'labels' => $meses,
	        'datasets' => [
	            [
	                'label' => 'Servicios',
	                // 'data' => $cotizacionesServicios->toArray(),
	                'data' => $valoresGrafico2,
	                'backgroundColor' => 'rgba(255, 99, 132, 0.5)',
	                'borderColor' => 'rgba(255, 99, 132, 1)',
	                'borderWidth' => 1
	            ],
	            [
	                'label' => 'Bienes',
	                // 'data' => $cotizacionesBienes->toArray(),
	                'data' => $valoresGrafico,
	                'backgroundColor' => 'rgba(54, 162, 235, 0.5)',
	                'borderColor' => 'rgba(54, 162, 235, 1)',
	                'borderWidth' => 1
	            ]
	        ]
	    ];
	    return response()->json($datos);
	}
}
