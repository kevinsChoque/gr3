<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailSuspensionProveedor;
use Carbon\Carbon;
use App\Models\TSuspension;
use App\Models\TProveedor;

use Illuminate\Support\Facades\Response;

class SuspensionController extends Controller
{
    public function actVerFile(Request $r,$idSus)
    {
        $archivoPdf = TSuspension::find($idSus)->archivoPdf;
        $file = $this->desencriptarDeepFile($archivoPdf);
        // dd($file);
        // return response($file)
        //     ->header('Content-Type', 'application/pdf');
        return Response::make($file, 200, [
            'Content-Type' => 'application/octet-stream', // Tipo de contenido del archivo (puede variar dependiendo del tipo de archivo)
            'Content-Disposition' => 'attachment; filename="archivo_descargable.pdf"', // Indica al navegador que descargue el archivo con el nombre "archivo_descargable.pdf"
        ]);
        // return response()->json(['estado' => true, 'file' => $file ]);
    }
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
            $r->merge(['idSus' => Str::uuid()]);
            $r->merge(['estadoSuspension' => '1']);
            $r->merge(['archivoPdf' => $this->deepFile($r->file('file'))]);
            // $r->merge(['archivo' => $nombreArchivo]);
            $r->merge(['fr' => Carbon::now()]);
            $tSus = TSuspension::create($r->all());
            if($tSus)
            {
                $tPro = TProveedor::find($r->idPro);
                $tPro->estadoProveedor = '0';
                if($tPro->save())
                {
                    if($tPro->tipoPersona=="PERSONA NATURAL")
                        $nombre = $tPro->nombre.' '.$tPro->apellidoPaterno.' '.$tPro->apellidoMaterno;
                    else
                        $nombre = $tPro->razonSocial;
                    $datosProveedor = ['fi' => $tSus->fechaInicio, 
                        'ff' => $tSus->fechaFinalizacion, 
                        'nombre' => $nombre,
                        'motivo' => $tSus->motivo,
                    ];
                    Mail::to('kevins.choque@gmail.com')->send(new EmailSuspensionProveedor($datosProveedor));

                    $r['hidPro'] = $tPro->idPro;
                    $r['hnombreProveedor'] = $this->razonSocialNombre($tPro);
                    $this->historial($r);
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
        DB::rollBack();
        return response()->json(['estado' => false, 'message' => 'Ingrese un archivo.']);
    }
}
