<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TProveedor;

class ProveedorController extends Controller
{
    public function actRegistrar()
    {
    	echo('cascascasc');exit();
    }
    public function actGuardar(Request $r)
    {
        $existeNumeroDocumento = TProveedor::where('numeroDocumento',$r->numeroDocumento)->where('estado','1')->first();
        if($existeNumeroDocumento!=null)
            return response()->json(['estado' => false, 'message' => 'El Proveedor con numero de documento: '.$r->numeroDocumento.' ya fue registrado.']);
        $tUsu = Session::get('usuario');
        $r->merge(['idUsu' => $tUsu->idUsu]);
        $r->merge(['usuario' => $r->numeroDocumento]);
        $r->merge(['password' => Hash::make($r->numeroDocumento)]);
        $r->merge(['estadoProveedor' => '1']);
    	$r->merge(['estado' => '1']);
        $r->merge(['fr' => Carbon::now()]);
    	DB::beginTransaction();
    	if(TProveedor::create($r->all()))
    	{
    		DB::commit();
    		return response()->json(['estado' => true, 'message' => 'Proveedor registrado correctamente.']);
    	}
    	else
    	{
    		DB::rollBack();
    		return response()->json(['estado' => false, 'message' => 'Error al registrar al proveedor.']);
    	}
    }
    public function actListar()
    {
        $tUsu = Session::get('usuario');
        if($tUsu->tipo=="administrador")
        {
            $registros = TProveedor::select('proveedor.*',
                'suspension.idSus',
                DB::raw("CONCAT(usuario.nombre, ' ', usuario.apellidoPaterno, ' ', usuario.apellidoMaterno) as nameUser"))
                ->leftjoin('suspension', 'suspension.idPro', '=', 'proveedor.idPro')
                ->join('usuario', 'usuario.idUsu', '=', 'proveedor.idUsu')
                ->orderBy('proveedor.idPro', 'desc')
                ->get();
        }
        else
        {
            $registros = TProveedor::select('proveedor.*','suspension.idSus')
                ->leftjoin('suspension', 'suspension.idPro', '=', 'proveedor.idPro')
                ->join('usuario', 'usuario.idUsu', '=', 'proveedor.idUsu')
                ->where('proveedor.idUsu', $tUsu->idUsu)
                ->where('proveedor.estado', '1')
                ->orderBy('proveedor.idPro', 'desc')
                ->get();
        }
        // $ban = $tUsu->tipo=="administrador"?DB::raw("CONCAT(usuario.nombre, ' ', usuario.apellidoPaterno, ' ', usuario.apellidoMaterno) as nameUser"):'proveedor.*';
        
        // $registros = TProveedor::select('proveedor.*','suspension.idSus',$ban)
        //     ->leftjoin('suspension', 'suspension.idPro', '=', 'proveedor.idPro')
        //     ->join('usuario', 'usuario.idUsu', '=', 'proveedor.idUsu')
        //     ->orderBy('proveedor.idPro', 'desc')
        //     ->get();
        return response()->json(["data"=>$registros]);

    }
    public function actEliminar(Request $r)
    {
        $tPro = TProveedor::find($r->id);
        $tPro->estado = 0;
        if($tPro->save())
            return response()->json(["estado"=>true, "message"=>"Operacion exitosa."]);
        else
            return response()->json(["estado"=>false, "message"=>"No se pudo proceder.",]);
    }
    public function actEditar(Request $r)
    {
        $registro = TProveedor::find($r->id);
        return response()->json(["data"=>$registro]);
    }
    public function actGuardarCambios(Request $r)
    {
        // dd($r->all());
        $tPro = TProveedor::find($r->idPro);
        if($r->numeroDocumento!=$tPro->numeroDocumento)
        {
            $existeNumeroDocumento = TProveedor::where('numeroDocumento', $r->numeroDocumento)->first();
            if($existeNumeroDocumento!=null)
                return response()->json(['estado' => false, 'message' => 'El numero del documento RUC: '.$r->numeroDocumento.' ya fue registrado con otro proveedor.']);
        }
        // dd($r->password!=null);
        $r->merge(['fa' => Carbon::now()]);
        $tPro->fill($r->all());
        if($tPro->save())
            return response()->json(['estado' => true, 'message' => 'Operacion exitosa.']);
        else
            return response()->json(['estado' => false, 'message' => 'Ocurrio un error.']);
    }
}
