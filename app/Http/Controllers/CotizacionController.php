<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
// use Illuminate\Support\Str;
use Carbon\Carbon;

use Illuminate\Support\Str;

use App\Models\TCotizacion;
use App\Models\TCotxitm;
use App\Models\TItem;

class CotizacionController extends Controller
{
    public function actGurdar(Request $r)
    {
        $existeNumCot = TCotizacion::where('numeroCotizacion',$r->numeroCotizacion)->where('estado','1')->first();
        if($existeNumCot!=null)
        {
            return response()->json(['estado' => false, 'message' => 'El numero de cotizacion ya fue ingresado.']);
        }
    	DB::beginTransaction();
    	if ($r->hasFile('file')) 
    	{
    		$archivo = $r->file('file');
            $nombreArchivo = time() . '_' . str_replace(' ', '',$archivo->getClientOriginalName());
	        if (Storage::put('public/cotizaciones/' . $nombreArchivo, file_get_contents($archivo))) 
	        {
                $tUsu = Session::get('usuario');

                // $r->merge(['idCot' => Str::uuid()]);
                $r->merge(['idUsu' => $tUsu->idUsu]);
	        	$r->merge(['estado' => 1]);
                $r->merge(['estadoCotizacion' => 1]);
	        	$r->merge(['archivo' => $nombreArchivo]);
                $r->merge(['fr' => Carbon::now()]);
	        	// dd($r->all());
	        	if(TCotizacion::create($r->all()))
	        	{
	        		DB::commit();
	        		return response()->json(['estado' => true, 'message' => 'Cotización registrada correctamente']);
	        	}
	        	else
	        	{
	        		DB::rollBack();
	        		return response()->json(['estado' => false, 'message' => 'Error al registrar la cotización']);
	        	}
	        } 
	        else 
	        {
	        	DB::rollBack();
	        	return response()->json(['estado' => false, 'message' => 'Error al guardar el archivo, no se registro la cotización']);
	        }
        }
        DB::rollBack();
        return response()->json(['estado' => false, 'message' => 'Ingrese un archivo de cotización.']);
    }
    public function actListar()
    {
        // dd((string) Str::uuid());
        // dd($tUsu);
        // dd($tUsu->idUsu);
    	// $registros = TCotizacion::orderBy('idCot','desc')->get();
    	// $registros = TCotizacion::select('cotizacion.*',
     //        DB::raw("CONCAT(usuario.nombre, ' ', usuario.apellidoPaterno, ' ', usuario.apellidoMaterno) as nameUser"))
     //        ->where('cotizacion.estado', 1)
     //        ->leftjoin('usuario', 'usuario.idUsu', '=', 'cotizacion.idUsu')
		   //  ->orderBy('cotizacion.idCot', 'desc')
		   //  ->get();
        // $ban = $tUsu->tipo=="administrador"?DB::raw("CONCAT(usuario.nombre, ' ', usuario.apellidoPaterno, ' ', usuario.apellidoMaterno) as nameUser"):'cotizacion.*';
        // $registros = TCotizacion::select('cotizacion.*',$ban)
        //     ->where('cotizacion.estado', 1)
        //     ->where('cotizacion.idUsu', $tUsu->idUsu)
        //     ->leftjoin('usuario', 'usuario.idUsu', '=', 'cotizacion.idUsu')
        //     ->orderBy('cotizacion.idCot', 'desc')
        //     ->get();
        $tUsu = Session::get('usuario');
        if($tUsu->tipo=="administrador")
        {
            // $registros = TProveedor::select('proveedor.*',
            //     'suspension.idSus',
            //     DB::raw("CONCAT(usuario.nombre, ' ', usuario.apellidoPaterno, ' ', usuario.apellidoMaterno) as nameUser"))
            //     ->leftjoin('suspension', 'suspension.idPro', '=', 'proveedor.idPro')
            //     ->join('usuario', 'usuario.idUsu', '=', 'proveedor.idUsu')
            //     ->orderBy('proveedor.idPro', 'desc')
            //     ->get();

            $registros = TCotizacion::select('cotizacion.*',
                DB::raw("CONCAT(usuario.nombre, ' ', usuario.apellidoPaterno, ' ', usuario.apellidoMaterno) as nameUser"))
                ->leftjoin('usuario', 'usuario.idUsu', '=', 'cotizacion.idUsu')
                ->orderBy('cotizacion.idCot', 'desc')
                ->get();
        }
        else
        {
            // $registros = TProveedor::select('proveedor.*','suspension.idSus')
            //     ->leftjoin('suspension', 'suspension.idPro', '=', 'proveedor.idPro')
            //     ->join('usuario', 'usuario.idUsu', '=', 'proveedor.idUsu')
            //     ->where('proveedor.idUsu', $tUsu->idUsu)
            //     ->where('proveedor.estado', '1')
            //     ->orderBy('proveedor.idPro', 'desc')
            //     ->get();
            $registros = TCotizacion::select('cotizacion.*')
                ->leftjoin('usuario', 'usuario.idUsu', '=', 'cotizacion.idUsu')
                ->where('cotizacion.idUsu', $tUsu->idUsu)
                ->where('cotizacion.estado', '1')
                ->orderBy('cotizacion.idCot', 'desc')
                ->get();
        }
        return response()->json(["data"=>$registros]);
    }
    public function actEliminar(Request $r)
    {
        $tCot = TCotizacion::find($r->id);
        $tCot->estado = 0;
        if($tCot->save())
            return response()->json(["estado"=>true, "message"=>"Operacion exitosa."]);
        else
            return response()->json(["estado"=>false, "message"=>"No se pudo proceder.",]);
    }
    public function actShow(Request $r)
    {
    	$registro = TCotizacion::find($r->id);
        // dd($r->all());
        // $registro = TCotizacion::select(DB::raw('count(cotxitm.idCi) as cantidad'),
        //             'cotizacion.idCot',
        //             'cotizacion.numeroCotizacion',
        //             'cotizacion.tipo',
        //             'cotizacion.concepto',
        //             'cotizacion.estadoCotizacion',
        //             'cotizacion.fechaCotizacion',
        //             'cotizacion.fechaFinalizacion',
        //             'cotizacion.archivo',
        //             'cotizacion.estadoCotizacion',
        //         )
        //         ->join('cotxitm', 'cotxitm.idCot', '=', 'cotizacion.idCot')
        //         ->where('cotizacion.idCot', $r->id)
        //         ->groupBy('cotizacion.idCot',
        //             'cotizacion.numeroCotizacion',
        //             'cotizacion.tipo',
        //             'cotizacion.concepto',
        //             'cotizacion.estadoCotizacion',
        //             'cotizacion.fechaCotizacion',
        //             'cotizacion.fechaFinalizacion',
        //             'cotizacion.archivo',
        //             'cotizacion.estadoCotizacion',
        //         )
        //         ->first();
        // echo(json_encode($registro));exit();
        return response()->json(["data"=>$registro]);
    }
    public function actGuardarCambios(Request $r)
    {
        // dd($r->all());
        $tCot = TCotizacion::find($r->id);
        if($r->numeroCotizacion!=$tCot->numeroCotizacion)
        {
            $existeNumCot = TCotizacion::where('numeroCotizacion',$r->numeroCotizacion)->where('estado','1')->first();
            if($existeNumCot!=null)
            {
                return response()->json(['estado' => false, 'message' => 'El numero de cotizacion ya fue ingresado.']);
            }
        }
        if ($r->hasFile('file')) 
        {
            // $rutaArchivo = 'public/cotizaciones/' . $tCot->archivo;
            if (Storage::exists('public/cotizaciones/' . $tCot->archivo)) 
            {
                Storage::delete('public/cotizaciones/' . $tCot->archivo);
            } 
            $archivo = $r->file('file');
            $nombreArchivo = time() . '_' . str_replace(' ', '',$archivo->getClientOriginalName());
            if (Storage::put('public/cotizaciones/' . $nombreArchivo, file_get_contents($archivo))) 
            {
                $r->merge(['archivo' => $nombreArchivo]);
            }
            
        }
        
        // ---------------------------------------------------------------------------
        // $existeNumCot = TCotizacion::where('numeroCotizacion',$r->numeroCotizacion)->where('estado','1')->first();
        // if($existeNumCot!=null)
        // {
        //     return response()->json(['estado' => false, 'message' => 'El numero de cotizacion ya fue ingresado.']);
        // }
        $r->merge(['fa' => Carbon::now()]);
        // $tCot = TCotizacion::find($r->id);
        $tCot->fill($r->all());
        if($tCot->save())
            return response()->json(['estado' => true, 'message' => 'Operacion exitosa.']);
        else
			return response()->json(['estado' => false, 'message' => 'Ocurrio un error.']);
    }
    public function actChangeEstadoCotizacion(Request $r)
    {
        $existeItems = TCotxitm::where('idCot',$r->id)->where('estado','1')->get();
        // dd(count($existeItems));
        if(count($existeItems)!=0)
        {
            $tCot = TCotizacion::where('idCot',$r->id)->first();
            $tCot->estadoCotizacion = '2';
            if($tCot->save())
                return response()->json(["estado"=>true, "message"=>"La Cotizacion fue publicada exitosamente."]);
            else
                return response()->json(["estado"=>false, "message"=>"No se pudo proceder con la publicacion.",]);
        }
        else
            return response()->json(["estado"=>false, "message"=>"No se puede publicar la cotizacion ya que no cuenta con items asignados.",]);
    }
    public function actShowCotizacion(Request $r)
    {
        $tCot = TCotizacion::find($r->id);
        $items = TItem::select('item.*','cotxitm.*','unidadmedida.nombre as nombreUm')
            ->join('cotxitm', 'cotxitm.idItm', '=', 'item.idItm')
            ->leftjoin('unidadmedida', 'unidadmedida.idUm', '=', 'cotxitm.idUm')
            ->where('cotxitm.idCot',$r->id)
            ->where('cotxitm.estado','1')
            ->orderBy('cotxitm.idCi', 'asc')
            ->get();
        return response()->json(["estado"=>true, "cot"=>$tCot, "items"=>$items]);
    }
    public function verArchivo($nombreArchivo)
    {
        $rutaArchivo = storage_path('app/public/cotizaciones/' . $nombreArchivo);
        if (file_exists($rutaArchivo)) 
            return response()->file($rutaArchivo);
        else 
            abort(404); 
    }
}
