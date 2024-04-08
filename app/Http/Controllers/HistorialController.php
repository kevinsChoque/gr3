<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\THistorial;

class HistorialController extends Controller
{
    public function actLoad(Request $r)
    {
    	// dd($r->all());
    	if($r->fecha === null)
    		$fecha = THistorial::where('idUsu', $r->idUsu)->orderBy('fecha', 'desc')->first()->fecha;
        else
            $fecha = $r->fecha;
        $fecha = Carbon::parse($fecha);
        $historial = THistorial::select('historial.*','usuario.nombre','usuario.apellidoPaterno')
            ->leftjoin('usuario', 'usuario.idUsu', '=', 'historial.idUsu')
            ->leftjoin('proveedor', 'proveedor.idPro', '=', 'historial.idPro')
            ->leftjoin('cotizacion', 'cotizacion.idCot', '=', 'historial.idCot')
            ->where('historial.idUsu',$r->idUsu)
            // ->where('historial.fecha',$fecha->format('Y-m-d'))
            ->whereDate('historial.fecha', '=', $fecha->format('Y-m-d'))
            ->orderBy('historial.fecha', 'asc')
            ->get();
        return response()->json(["estado"=>true, "his"=>$historial]);
    }
    public function actLoadPro(Request $r)
    {
        // dd($r->all());
        if($r->fecha === null)
            $fecha = THistorial::where('idPro', $r->idPro)
                ->where('idUsu', null)
                ->orderBy('fecha', 'desc')
                ->first()->fecha;
        else
            $fecha = $r->fecha;
        $fecha = Carbon::parse($fecha);
        $historial = THistorial::select('historial.*','usuario.nombre','usuario.apellidoPaterno')
            ->leftjoin('usuario', 'usuario.idUsu', '=', 'historial.idUsu')
            ->leftjoin('proveedor', 'proveedor.idPro', '=', 'historial.idPro')
            ->leftjoin('cotizacion', 'cotizacion.idCot', '=', 'historial.idCot')
            ->where('historial.idUsu',$r->idUsu)
            // ->where('historial.fecha',$fecha->format('Y-m-d'))
            ->whereDate('historial.fecha', '=', $fecha->format('Y-m-d'))
            ->orderBy('historial.fecha', 'asc')
            ->get();
        // dd($historial);
        return response()->json(["estado"=>true, "his"=>$historial]);
    }
}

