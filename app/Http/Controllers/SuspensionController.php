<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TSuspension;

class SuspensionController extends Controller
{
    public function actGuardar(Request $r)
    {
        $tSus = TSuspension::where('idPro',$r->idPro)->where('estadoSuspension','1')->first();
        if($tSus!=null)
        {
            return response()->json(['estado' => false, 'message' => 'El proveedor ya cuenta con suspension.']);
        }
        DB::beginTransaction();
        if ($r->hasFile('file')) 
        {
            $archivo = $r->file('file');
            $nombreArchivo = time() . '_' . str_replace(' ', '',$archivo->getClientOriginalName());
            if (Storage::put('public/suspensiones/'.$r->idPro.'/' . $nombreArchivo, file_get_contents($archivo))) 
            {
                $r->merge(['estadoSuspension' => '1']);
                $r->merge(['archivo' => $nombreArchivo]);
                $r->merge(['fr' => Carbon::now()]);
                if(TSuspension::create($r->all()))
                {
                    DB::commit();
                    return response()->json(['estado' => true, 'message' => 'La suspension del proveedor fue registrada correctamente.']);
                }
                else
                {
                    DB::rollBack();
                    return response()->json(['estado' => false, 'message' => 'Error al registrar la suspension.']);
                }
            } 
            else 
            {
                DB::rollBack();
                return response()->json(['estado' => false, 'message' => 'Error al guardar el archivo, no se registro la suspension.']);
            }
        }
        DB::rollBack();
        return response()->json(['estado' => false, 'message' => 'Ingrese un archivo.']);
    }
}
