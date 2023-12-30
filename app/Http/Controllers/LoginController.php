<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\TUsuario;
use App\Models\TProveedor;

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
    	return response()->json(['estado' => true, 'message' => 'ok']);
    }
    public function siginpro(Request $r)
    {
        $tPro = TProveedor::where('usuario',$r->usuario)->first();
        // validacion del proveedor para ver si existe
        if($tPro==null)
        {   return response()->json(['estado' => false, 'message' => 'El usuario '.$r->usuario.' no se encuentra registrado.']);}
        // validacion del proveedor para ver si esta inactivo o eliminado
        if($tPro->estado=='0' || $tPro->estadoProveedor=='0')
        {   return response()->json(['estado' => false, 'message' => 'El proveedor '.$r->usuario.' no cuenta con acceso al sistema.']);}
        // validacion del proveedor para ver si la contraseña es la correcta
        if(!Hash::check($r->password, $tPro->password)) 
        {   return response()->json(['estado' => false, 'message' => 'La contraseña es incorrecta.']);}
        // guardado en sesion del proveedor logueado
        session(['proveedor' => $tPro]);
        return response()->json(['estado' => true, 'message' => 'ok']);
    }
    public function logout()
    {
    	session()->flush();
    	return redirect('login/login');
    }
    public function logoutPro()
    {
        session()->forget('proveedor');
        return redirect('loginProveedor/loginProveedor');
    }
}
