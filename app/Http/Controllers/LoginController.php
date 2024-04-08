<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Mail\EmailRecuperacion;

use App\Models\TUsuario;
use App\Models\TProveedor;
use App\Models\TSuspension;

class LoginController extends Controller
{
    public function actionLogin()
    {
        if (Session::has('usuario')) 
            return redirect('/home/home');
        else 
            return view('login/login');
    }
    public function sigin(Request $r)
    {
    	$tUsu = TUsuario::where('usuario',$r->usuario)->first();
        // validacion de usuario para ver si esta inactivo
        if($tUsu->estado=='0')
        {   return response()->json(['estado' => false, 'message' => 'El usuario '.$r->usuario.' no cuenta con acceso al sistema.']);}
        // validacion de usuario para ver siexiste
    	if($tUsu==null)
    	{  return response()->json(['estado' => false, 'message' => 'El usuario no se encuentra registrado.']);}
        // validacion de usuario para ver si la contraseña es la correcta
    	if(!Hash::check($r->password, $tUsu->password)) 
    	{  return response()->json(['estado' => false, 'message' => 'La contraseña es incorrecta.']);}
        // guardado en sesion el usuario logueado
    	session(['usuario' => $tUsu]);
        $this->historial($r);
    	return response()->json(['estado' => true, 'message' => 'ok']);
    }
    public function siginpro(Request $r)
    {
        $tPro = TProveedor::where('usuario',$r->usuario)->first();
        // validacion del proveedor para ver si existe
        if($tPro==null)
        {   return response()->json(['estado' => false, 'message' => 'El usuario '.$r->usuario.' no se encuentra registrado.']);}

        $verifySuspension = TSuspension::where('idPro',$tPro->idPro)
            ->where('estadoSuspension','1')
            ->first();
        // dd($verifySuspension->idSus);
        if($verifySuspension!=null)
        {   return response()->json(['estado' => false,
                'tipo' => 'suspension', 
                'message' => 'El usuario '.$r->usuario.' se encuentra con suspension.',
                'sus' => $verifySuspension,
                'archivoPdf' => $this->desencriptarDeepFile($verifySuspension->archivoPdf),
            ]);
        }


        // validacion del proveedor para ver si esta inactivo o eliminado
        if($tPro->estado=='0' || $tPro->estadoProveedor=='0')
        {   return response()->json(['estado' => false, 'message' => 'El proveedor '.$r->usuario.' no cuenta con acceso al sistema.']);}
        // validacion del proveedor para ver si la contraseña es la correcta
        if(!Hash::check($r->password, $tPro->password)) 
        {   return response()->json(['estado' => false, 'message' => 'La contraseña es incorrecta.']);}
        // guardado en sesion del proveedor logueado
        session(['proveedor' => $tPro]);
        $r['hidPro'] = $tPro->idPro;
        $this->historial($r);
        return response()->json(['estado' => true, 'message' => 'ok']);
    }
    public function logout(Request $r)
    {
        $this->historial($r);
    	session()->flush();
    	return redirect('login/login');
    }
    public function logoutPro(Request $r)
    {
        $r['hidPro'] = Session::get('proveedor')->idPro;
        $this->historial($r);
        session()->forget('proveedor');
        return redirect('loginProveedor/loginProveedor');
    }
    public function actRecuperar(Request $r)
    {
        $tPro = TProveedor::where('correo',$r->correo)->first();
        if($tPro==null)
        {return response()->json(['estado' => false, 'message' => 'No se encontro al proveedor con el correo ingresado: '.$r->correo]);}
        // dd('paso aki');

        $password = Str::random(8);
        if($tPro->tipoPersona=="PERSONA NATURAL")
            $nombre = $tPro->nombre.' '.$tPro->apellidoPaterno.' '.$tPro->apellidoMaterno;
        else
            $nombre = $tPro->razonSocial;
        $datosProveedor = ['usuario' => $tPro->numeroDocumento, 'password' => $password, 'nombre' => $nombre];
        $tPro->password = Hash::make($password);

        DB::beginTransaction();
        if($tPro->save())
        {
            try 
            {
                Mail::to('kevins.choque@gmail.com')->send(new EmailRecuperacion($datosProveedor));
                DB::commit();
                return response()->json(['estado' => true, 'message' => 'Su contraseñase se le envio a su correo '.$r->correo.'.']);
            } 
            catch (Exception $e) 
            {
                DB::rollBack();
                return response()->json(['estado' => false, 'message' => 'Ocurrio un error porfavor contactese con el Administrador.']);
            }
        }
        return response()->json(['estado' => false, 'message' => 'Ocurrio un error porfavor contactese con el Administrador.']);
    }
}
