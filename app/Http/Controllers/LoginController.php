<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\TUsuario;
use App\Models\TProveedor;

class LoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(function ($request, $next) 
    //     {
    //         // Verificar si hay una sesión activa o una variable de sesión llamada "usuario"
    //         if (Session::has('usuario')) {
    //             return redirect('/home/home');
    //             // Acciones a realizar si hay sesión o variable de sesión "usuario"
    //             // Puedes agregar cualquier lógica adicional aquí
    //         } else {
    //             // Acciones a realizar si no hay sesión o variable de sesión "usuario"
    //             // Por ejemplo, podrías redirigir a una página de inicio de sesión
    //             // return redirect('/login');
    //             return view('login/login');
    //         }
    //         // return $next($request);
    //     });
    // }
    public function actionLogin()
    {
        if (Session::has('usuario')) 
            return redirect('/home/home');
        else 
            return view('login/login');
    }
    public function sigin(Request $r)
    {
        // dd($r->all());
    	$tUsu = TUsuario::where('usuario',$r->usuario)->first();
        // dd($tUsu);
        if($tUsu->estado=='0')
        {
            return response()->json(['estado' => false, 'message' => 'El usuario '.$r->usuario.' no cuenta con acceso al sistema.']);
        }
    	if($tUsu==null)
    	{
    		return response()->json(['estado' => false, 'message' => 'El usuario no se encuentra registrado.']);
    	}
    	if(!Hash::check($r->password, $tUsu->password)) 
    	{
    		return response()->json(['estado' => false, 'message' => 'La contraseña es incorrecta.']);
    	}
    	session(['usuario' => $tUsu]);
    	return response()->json(['estado' => true, 'message' => 'ok']);
    }
    public function siginpro(Request $r)
    {
        // session()->flush();
        // session(['proveedor' => TProveedor::find(3)]);
        // return response()->json(['estado' => true, 'message' => 'ok']);
        // ---

        $tPro = TProveedor::where('usuario',$r->usuario)->first();
        // dd($r->all());
        if($tPro->estado=='0' || $tPro->estadoProveedor=='0')
        {
            return response()->json(['estado' => false, 'message' => 'El proveedor '.$r->usuario.' no cuenta con acceso al sistema.']);
        }
        if($tPro==null)
        {
            return response()->json(['estado' => false, 'message' => 'El usuario '.$r->usuario.' no se encuentra registrado.']);
        }
        if(!Hash::check($r->password, $tPro->password)) 
        {
            return response()->json(['estado' => false, 'message' => 'La contraseña es incorrecta.']);
        }
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
        // session()->flush();
        session()->forget('proveedor');
        return redirect('loginProveedor/loginProveedor');
    }
}
