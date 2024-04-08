<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\TProveedor;

class PaProveedorController extends Controller
{
    public function actGuardar(Request $r)
    {
        // guarda los datos faltantes del proveedor
    	$tPro = Session::get('proveedor');
    	$tPro = TProveedor::find($tPro->idPro);
        // verificamos si cambio el ruc del proveedor
        // como tambien si se repite en la tabla
        if($r->numeroDocumento!=$tPro->numeroDocumento)
        {
            $existeNumeroDocumento = TProveedor::where('numeroDocumento', $r->numeroDocumento)->first();
            if($existeNumeroDocumento!=null)
                return response()->json(['estado' => false, 'message' => 'El numero del documento RUC: '.$r->numeroDocumento.' ya fue registrado con otro proveedor.']);
        }
        // verificamos si la contraseña es la misma o cambio
        // si es la misma la cambiamos o caso contrario continua con la misma
        if($r->password!=null)
        {   $r->merge(['password' => Hash::make($r->password)]);}
        else
        {   $r->merge(['password' => $tPro->password]);}
        $r->merge(['fa' => Carbon::now()]);
        // seteamos los datos actualizados
        $tPro->fill($r->all());
        if($tPro->save())
        {
        	session(['proveedor' => $tPro]);
            $r['hidPro'] = $tPro->idPro;
            $this->historial($r);
            return response()->json(['estado' => true, 'message' => 'Operacion exitosa.']);
        }
        else
            return response()->json(['estado' => false, 'message' => 'Ocurrio un error.']);
    }
    public function actSavePassword(Request $r)
    {
        $tPro = Session::get('proveedor');
        $tPro = TProveedor::find($tPro->idPro);
        $tPro->password = Hash::make($r->password);
        $tPro->fa = Carbon::now();
        if($tPro->save())
        {
            session(['proveedor' => $tPro]);
            $r['hidPro'] = $tPro->idPro;
            $this->historial($r);
            return response()->json(['estado' => true, 'message' => 'Operacion exitosa.']);
        }
        else
            return response()->json(['estado' => false, 'message' => 'Ocurrio un error.']);
    }
    public function actEditar(Request $r)
    {
        $registro = TProveedor::find($r->id);
        return response()->json(["data"=>$registro]);
    }
}
