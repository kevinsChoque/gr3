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
        // dd($r->all());
        // solo se puede recotizar cuando una cotizacion a finalizado
        $tCot = TCotizacion::where('idCot',$r->idCot)->where('estadoCotizacion','3')->first();
        if($tCot==null)
        {   return response()->json(['estado' => false, 'message' => 'La cotizacion no fue PUBLICADO.']);}
        // se inicializa la transaccion
        DB::beginTransaction();
        // toda recotizacion contendra un archivo
        // if ($r->hasFile('file')) 
        // {
        $r->merge(['idRec' => Str::uuid()]);
        $r->merge(['fechaCotizacion' => $r->newFechaCotizacion]);
        $r->merge(['fechaFinalizacion' => $r->newFechaFinalizacion]);
        $r->merge(['estadoRecotizacion' => '1']);
        $r->merge(['archivoPdf' => $r->hasFile('file') ? $this->deepFile($r->file('file')) : null]);
        $r->merge(['fr' => Carbon::now()]);
        if(TRecotizacion::create($r->all()))
        {
            $tCot->estadoCotizacion = '5';
            if($tCot->save())
            {
                $r['hidCot'] = $tCot->idCot;
                // $r['hnumeroCotizacion'] = $tCot->numeroCotizacion;
                $r['hnumeroCotizacion'] = " <b>(".$tCot->numeroCotizacion.")</b> ".$this->estadoCotizacion($tCot);
                $this->historial($r);
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
        // }
        // DB::rollBack();
        // return response()->json(['estado' => false, 'message' => 'Ingrese un archivo.']);
    }
}
