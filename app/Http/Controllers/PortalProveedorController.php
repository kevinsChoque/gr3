<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Mail\EmailProveedor;

use App\Models\TProveedor;

class PortalProveedorController extends Controller
{
    public function actGuardar(Request $r)
    {
        // seta funcion es cuando el proveedor se registra a la plataforma desde fuera o sin necesidad de ingresar a la plataforma
        // primero se verifica la existencia de duplicidad del numero de ruc del proveedor como tambien el correo
        $proveedorBuscado = TProveedor::where('numeroDocumento',$r->ruc)->orWhere('correo',$r->correo)->first();
        if($proveedorBuscado!=null)
        {
            $message = $r->ruc==$proveedorBuscado->numeroDocumento?
                'El Proveedor con numero de documento: '.$r->ruc.' ya fue registrado.':
                'El Proveedor con correo: '.$r->correo.' ya fue registrado.';
            return response()->json(['estado' => false, 'message' => $message]);
        }

        $r->merge(['usuario' => $r->ruc]);
        $r->merge(['numeroDocumento' => $r->ruc]);
        
        $password = Str::random(8);
        $r->merge(['idPro' => Str::uuid()]);
        $r->merge(['password' => Hash::make($password)]);
        $r->merge(['estadoProveedor' => '1']);
    	$r->merge(['estado' => '1']);
        $r->merge(['passwrodPro' => $password]);
        $r->merge(['fr' => Carbon::now()]);
        if($r->tipoPersona=="PERSONA NATURAL")
            $nombre = $r->nombre.' '.$r->apellidoPaterno.' '.$r->apellidoMaterno;
        else
            $nombre = $r->razonSocial;
        $datosProveedor = ['usuario' => $r->ruc, 'password' => $password, 'nombre' => $nombre];

        try 
        {
            DB::beginTransaction();
            TProveedor::create($r->all());
            // una vez guardado el registro se envia las credenciales del usuario al correo q ingreso
            Mail::to('kevins.choque@gmail.com')->send(new EmailProveedor($datosProveedor));
            DB::commit();
            return response()->json(['estado' => true, 'message' => 'Su usuario y contraseñase se le envio a su correo '.$r->correo.'.']);
        } 
        catch (Exception $e) 
        {
            DB::rollBack();
            return response()->json(['estado' => false, 'message' => 'Ocurrio un error porfavor contactese con el Administrador.']);
        }
    }
}
