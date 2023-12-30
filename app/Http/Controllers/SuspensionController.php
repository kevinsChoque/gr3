<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\TSuspension;
use App\Models\TProveedor;

class SuspensionController extends Controller
{
    public function actGuardar(Request $r)
    {
        // se verifica si el proveedor no tiene una suspension previamente
        $tSus = TSuspension::where('idPro',$r->idPro)->where('estadoSuspension','1')->first();
        if($tSus!=null)
        {   return response()->json(['estado' => false, 'message' => 'El proveedor ya cuenta con suspension.']);}
        DB::beginTransaction();
        // toda suspension al proveedor contendra un archivo relacionado
        if ($r->hasFile('file')) 
        {
            $archivo = $r->file('file');
            $nombreArchivo = time() . '_' . str_replace(' ', '',$archivo->getClientOriginalName());
            if (Storage::put('public/suspensiones/'.$r->idPro.'/' . $nombreArchivo, file_get_contents($archivo))) 
            {
                $r->merge(['idSus' => Str::uuid()]);
                $r->merge(['estadoSuspension' => '1']);
                $r->merge(['archivo' => $nombreArchivo]);
                $r->merge(['fr' => Carbon::now()]);
                if(TSuspension::create($r->all()))
                {
                    $tPro = TProveedor::find($r->idPro);
                    $tPro->estadoProveedor = '0';
                    if($tPro->save())
                    {
                        DB::commit();
                        return response()->json(['estado' => true, 'message' => 'La suspension del proveedor fue registrada correctamente.']);
                    }
                    else
                    {
                        DB::rollBack();
                        return response()->json(['estado' => false, 'message' => 'Error al actualizar estado de proveedor.']);
                    }
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
