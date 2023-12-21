<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\TUsuario;

class UsuarioController extends Controller
{
    public function actGuardar(Request $r)
    {
        $tUsu = TUsuario::where('dni',$r->dni)->where('estado','1')->orWhere('usuario',$r->usuario)->first();
        if($tUsu!=null)
        {
            if($tUsu->dni == $r->dni)
                return response()->json(['estado' => false, 'message' => 'El numero de DNI: '.$r->dni.' ya fue registrado.']); 
            if($tUsu->usuario == $r->usuario)
                return response()->json(['estado' => false, 'message' => 'El usuario : '.$r->usuario.' ya fue registrado.']); 
        }
        // if($existeDni!=null)
        // {
        //     return response()->json(['estado' => false, 'message' => 'El numero de DNI: '.$r->dni.' ya fue registrado.']);
        // }
        $r->merge(['password' => Hash::make($r->password)]);
    	$r->merge(['estado' => '1']);
        $r->merge(['fr' => Carbon::now()]);
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
        if($r->dni!=$tUse->dni)
        {
            $tusuario = TUsuario::where('dni', $r->dni)->where('estado','1')->first();
            if($tusuario!=null)
                return response()->json(['estado' => false, 'message' => 'El numero de DNI: '.$r->dni.' ya fue registrado.']); 
        }
        if ($r->usuario!=$tUse->usuario) 
        {
            $tusuario = TUsuario::where('usuario', $r->usuario)->where('estado','1')->first();
            if($tusuario!=null)
                return response()->json(['estado' => false, 'message' => 'El usuario : '.$r->usuario.' ya fue registrado.']); 
        }
        if($r->password!=null)
        {
            $r->merge(['password' => Hash::make($r->password)]);
        }
        $r->merge(['fa' => Carbon::now()]);
        $tUse->fill($r->all());
        if($tUse->save())
            return response()->json(['estado' => true, 'message' => 'Operacion exitosa.']);
        else
            return response()->json(['estado' => false, 'message' => 'Ocurrio un error.']);
    }
}
