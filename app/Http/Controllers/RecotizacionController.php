<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TRecotizacion;
use App\Models\TCotizacion;

class RecotizacionController extends Controller
{
    // public function actGuardar_b(Request $r)
    // {
    // 	dd('llego hasta aki');
    // }
    public function actGuardar(Request $r)
    {
        $tCot = TCotizacion::where('idCot',$r->idCot)->where('estadoCotizacion','2')->first();
        if($tCot==null)
        {
            return response()->json(['estado' => false, 'message' => 'La cotizacion no fue PUBLICADO.']);
        }
        DB::beginTransaction();
        if ($r->hasFile('file')) 
        {
            $archivo = $r->file('file');
            $nombreArchivo = time() . '_' . str_replace(' ', '',$archivo->getClientOriginalName());
            if (Storage::put('public/recotizaciones/'.$r->idCot.'/' . $nombreArchivo, file_get_contents($archivo))) 
            {
                $r->merge(['archivo' => $nombreArchivo]);
                $r->merge(['estadoRecotizacion' => '1']);
                $r->merge(['fr' => Carbon::now()]);
                if(TRecotizacion::create($r->all()))
                {
                	$tCot->estadoCotizacion = '5';
                	if($tCot->save())
                	{
	                    DB::commit();
	                    return response()->json(['estado' => true, 'message' => 'Recotizacion registrado correctamente.']);
                	}
                	else
                	{
                		DB::rollBack();
                    	return response()->json(['estado' => false, 'message' => 'Ocurrio un error al actualizar el estado de la cotizacion.']);
                	}
                }
                else
                {
                    DB::rollBack();
                    return response()->json(['estado' => false, 'message' => 'Error al registrar la recotizacion.']);
                }
            } 
            else 
            {
                DB::rollBack();
                return response()->json(['estado' => false, 'message' => 'Error al guardar el archivo, no se registro la recotizacion.']);
            }
        }
        DB::rollBack();
        return response()->json(['estado' => false, 'message' => 'Ingrese un archivo.']);
    }
}
