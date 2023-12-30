<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\TRecotizacion;
use App\Models\TCotizacion;

class RecotizacionController extends Controller
{
    public function actGuardar(Request $r)
    {
        // solo se puede recotizar cuando una cotizacion a finalizado
        $tCot = TCotizacion::where('idCot',$r->idCot)->where('estadoCotizacion','3')->first();
        if($tCot==null)
        {   return response()->json(['estado' => false, 'message' => 'La cotizacion no fue PUBLICADO.']);}
        // se inicializa la transaccion
        DB::beginTransaction();
        // toda recotizacion contendra un archivo
        if ($r->hasFile('file')) 
        {
            $archivo = $r->file('file');
            $nombreArchivo = time() . '_' . str_replace(' ', '',$archivo->getClientOriginalName());
            // nos muestra si se guardo exitosamente el file, y despues guarda el registro de recotizacion con el nombre del archivo q se guardo
            if (Storage::put('public/recotizaciones/'.$r->idCot.'/' . $nombreArchivo, file_get_contents($archivo))) 
            {
                $r->merge(['idRec' => Str::uuid()]);
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
