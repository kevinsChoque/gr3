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
    	$tPro = Session::get('proveedor');
    	$tPro = TProveedor::find($tPro->idPro);
        if($r->numeroDocumento!=$tPro->numeroDocumento)
        {
            $existeNumeroDocumento = TProveedor::where('numeroDocumento', $r->numeroDocumento)->first();
            if($existeNumeroDocumento!=null)
                return response()->json(['estado' => false, 'message' => 'El numero del documento RUC: '.$r->numeroDocumento.' ya fue registrado con otro proveedor.']);
        }
        if($r->password!=null)
        {
            $r->merge(['password' => Hash::make($r->password)]);
        }
        else
        {
        	$r->merge(['password' => $tPro->password]);
        }
        // dd($r->password!=null);
        $r->merge(['fa' => Carbon::now()]);
        $tPro->fill($r->all());
        if($tPro->save())
        {
            // dd($tPro);
        	session(['proveedor' => $tPro]);
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
            return response()->json(['estado' => true, 'message' => 'Operacion exitosa.']);
        }
        else
            return response()->json(['estado' => false, 'message' => 'Ocurrio un error.']);
    }
}
