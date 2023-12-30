<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Carbon\Carbon;
use App\Models\TUsuario;

class UsuarioController extends Controller
{
    public function actGuardar(Request $r)
    {
        // se realiza una validacion del dni y usuario ya q son unicos
        $tUsu = TUsuario::where('dni',$r->dni)->where('estado','1')->orWhere('usuario',$r->usuario)->first();
        if($tUsu!=null)
        {
            if($tUsu->dni == $r->dni)
                return response()->json(['estado' => false, 'message' => 'El numero de DNI: '.$r->dni.' ya fue registrado.']); 
            if($tUsu->usuario == $r->usuario)
                return response()->json(['estado' => false, 'message' => 'El usuario : '.$r->usuario.' ya fue registrado.']); 
        }
        $r->merge(['idUsu' => Str::uuid()]);
        $r->merge(['password' => Hash::make($r->password)]);
    	$r->merge(['estado' => '1']);
        $r->merge(['fr' => Carbon::now()]);
        // se inicializa la transaccion para guardar el registro
    	DB::beginTransaction();
    	if(TUsuario::create($r->all()))
    	{
    		DB::commit();
    		return response()->json(['estado' => true, 'message' => 'Usuario registrado correctamente']);
    	}
    	else
    	{
    		DB::rollBack();
    		return response()->json(['estado' => false, 'message' => 'Error al registrar el usuario']);
    	}
    }
    public function actListar()
    {
        $registros = TUsuario::orderBy('idUsu', 'desc')->get();
        return response()->json(["data"=>$registros]);
    }
    public function actEliminar(Request $r)
    {
        // los usuarios no se eliminan solo se cambia el estado, esto para tener en cuenta en el historico
        $tUsu = TUsuario::find($r->id);
        $tUsu->estado = 0;
        if($tUsu->save())
            return response()->json(["estado"=>true, "message"=>"Operacion exitosa."]);
        else
            return response()->json(["estado"=>false, "message"=>"No se pudo proceder.",]);
    }
    public function actEditar(Request $r)
    {
        $registro = TUsuario::find($r->id);
        return response()->json(["data"=>$registro]);
    }
    public function actGuardarCambios(Request $r)
    {
        $tUse = TUsuario::find($r->idUsu);
        // se verifica que el nuevo dni no se duplique en la tabla
        if($r->dni!=$tUse->dni)
        {
            $tusuario = TUsuario::where('dni', $r->dni)->where('estado','1')->first();
            if($tusuario!=null)
                return response()->json(['estado' => false, 'message' => 'El numero de DNI: '.$r->dni.' ya fue registrado.']); 
        }
        // se verifica que el nuevo usuario no se duplique en la tabla
        if ($r->usuario!=$tUse->usuario) 
        {
            $tusuario = TUsuario::where('usuario', $r->usuario)->where('estado','1')->first();
            if($tusuario!=null)
                return response()->json(['estado' => false, 'message' => 'El usuario : '.$r->usuario.' ya fue registrado.']); 
        }
        // se verifica si cambio la contraseña, si lo iso reemplaza la anterior caso contrario continua con la misma
        if($r->password!==null)
            $r->merge(['password' => Hash::make($r->password)]);
        else
            $r->merge(['password' => $tUse->password]);
        // seteamos el request con la fecha de actualizacion y procedemos a guardar
        $r->merge(['fa' => Carbon::now()]);
        $tUse->fill($r->all());
        if($tUse->save())
            return response()->json(['estado' => true, 'message' => 'Operacion exitosa.']);
        else
            return response()->json(['estado' => false, 'message' => 'Ocurrio un error.']);
    }
}
