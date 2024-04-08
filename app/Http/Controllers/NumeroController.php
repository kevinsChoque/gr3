<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Models\TNumero;
use App\Models\TCotizacion;

class NumeroController extends Controller
{
    public function actListar(Request $r)
    {
        $registros = TNumero::all();
        $numeroActual = TCotizacion::count() > 0 ? TCotizacion::max('numeroCotizacion') : null;
        return response()->json([
            "data"=>$registros,
            "numeroActual" => $numeroActual,
        ]);
    }
    // public function actActual(Request $r)
    // {
    //     $numero = TCotizacion::count() > 0 ? TCotizacion::max('numeroCotizacion') : null;
    //     return response()->json([
    //         "numero"=>$numero,
    //     ]);
    // }
    public function actRegistrar(Request $r)
    {
        $numeroMaximo = TCotizacion::count() > 0 ? TCotizacion::max('numeroCotizacion') : null;
        if($numeroMaximo !== null)
        {
            if($r->numero < $numeroMaximo)
                return response()->json(['estado' => false, 'message' => 'El numero ingresado debe ser mayor al numero actual <b>'.$numeroMaximo.'</b>']);
        }
        $tNum = TNumero::count() > 0 ? TNumero::first() : new TNumero();
        $tNum->numero = $r->numero;
        $tNum->estado = 1;
        if($tNum->save())
            return response()->json(['estado' => true, 'message' => 'Numero(autogenerado) registrado correctamente.']);
        else
            return response()->json(['estado' => false, 'message' => 'Error al registrar el numero.']);


    }
    public function actNumeroCotizacion()
    {
        return $this->numeroCotizacion();
    }
}
