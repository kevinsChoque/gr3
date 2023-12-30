<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\TCotizacion;
use App\Models\TCotxitm;
use App\Models\TItem;

class CotizacionController extends Controller
{
    public function actGurdar(Request $r)
    {
        $existeNumCot = TCotizacion::where('numeroCotizacion',$r->numeroCotizacion)->where('estado','1')->first();
        if($existeNumCot!=null)
        {   return response()->json(['estado' => false, 'message' => 'El numero de cotizacion ya fue ingresado.']);}
        /*
        *   inicializando transaccion
        *   si no se encuentra ninguna incidencia se guarda el registro caso contrario se reinvierte el proceso
        */
    	DB::beginTransaction();
    	if ($r->hasFile('file')) 
    	{
    		$archivo = $r->file('file');
            $nombreArchivo = time() . '_' . str_replace(' ', '',$archivo->getClientOriginalName());
	        if (Storage::put('public/cotizaciones/' . $nombreArchivo, file_get_contents($archivo))) //solo si se envia el file se guarda
	        {
                $tUsu = Session::get('usuario');

                $r->merge(['idCot' => Str::uuid()]);
                $r->merge(['idUsu' => $tUsu->idUsu]);
	        	$r->merge(['estado' => 1]);
                $r->merge(['estadoCotizacion' => 1]);
	        	$r->merge(['archivo' => $nombreArchivo]);
                $r->merge(['fr' => Carbon::now()]);
                // se crea el registro
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
        $tUsu = Session::get('usuario');
        // dependiendo al tipo de usuario se enviara el json de cotizaciones (administrador y cotizador)
        if($tUsu->tipo=="administrador")
        {
            $registros = TCotizacion::select('cotizacion.*',
                DB::raw("CONCAT(usuario.nombre, ' ', usuario.apellidoPaterno, ' ', usuario.apellidoMaterno) as nameUser"))
                ->leftjoin('usuario', 'usuario.idUsu', '=', 'cotizacion.idUsu')
                ->orderBy('cotizacion.fr', 'desc')
                ->get();
        }
        else
        {
            $registros = TCotizacion::select('cotizacion.*')
                ->leftjoin('usuario', 'usuario.idUsu', '=', 'cotizacion.idUsu')
                ->where('cotizacion.idUsu', $tUsu->idUsu)
                ->where('cotizacion.estado', '1')
                ->orderBy('cotizacion.fr', 'desc')
                ->get();
        }
        return response()->json(["data"=>$registros]);
    }
    public function actEliminar(Request $r)
    {
        $tCot = TCotizacion::find($r->id);
        $tCot->estado = 0;
        // los registro no se eliminan, se cambia de estado, esto para tomanrlo en cuenta en el historico de la tabla
        if($tCot->save())
            return response()->json(["estado"=>true, "message"=>"Operacion exitosa."]);
        else
            return response()->json(["estado"=>false, "message"=>"No se pudo proceder.",]);
    }
    public function actShow(Request $r)
    {
        // dd($r->all());
        /*
        *   se envia el json con el registro de la cotizacion y su detalle de items
        *   para la visualizacion y llenado de cantidad y unidad de medida
        */
        $registro = TCotizacion::select(DB::raw('count(cotxitm.idCi) as cantidad'),
            'cotizacion.idCot',
            'cotizacion.numeroCotizacion',
            'cotizacion.tipo',
            'cotizacion.concepto',
            'cotizacion.estadoCotizacion',
            'cotizacion.fechaCotizacion',
            'cotizacion.fechaFinalizacion',
            'cotizacion.horaCotizacion',
            'cotizacion.horaFinalizacion',
            'cotizacion.archivo',
            'cotizacion.estadoCotizacion',
        )
        ->join('cotxitm', 'cotxitm.idCot', '=', 'cotizacion.idCot')
        ->where('cotizacion.idCot', $r->id)
        ->groupBy('cotizacion.idCot',
            'cotizacion.numeroCotizacion',
            'cotizacion.tipo',
            'cotizacion.concepto',
            'cotizacion.estadoCotizacion',
            'cotizacion.fechaCotizacion',
            'cotizacion.fechaFinalizacion',
            'cotizacion.horaCotizacion',
            'cotizacion.horaFinalizacion',
            'cotizacion.archivo',
            'cotizacion.estadoCotizacion',
        )
        ->first();
        // dd($registro);
        return response()->json(["data"=>$registro]);
    }
    public function actVerCotizacion(Request $r)
    {
        $registro = TCotizacion::find($r->id);
        return response()->json(["data"=>$registro]);
    }
    public function actGuardarCambios(Request $r)
    {
        $tCot = TCotizacion::find($r->id);
        if($r->numeroCotizacion!=$tCot->numeroCotizacion)
        {
            $existeNumCot = TCotizacion::where('numeroCotizacion',$r->numeroCotizacion)->where('estado','1')->first();
            if($existeNumCot!=null)
            {   return response()->json(['estado' => false, 'message' => 'El numero de cotizacion ya fue ingresado.']);}
        }
        // en caso envie nuevo archivo se verifica
        if ($r->hasFile('file')) 
        {
            // si envia nuevo archivo se reemplaza el anterior eliminando el anterior file y guardando este ultimo
            if (Storage::exists('public/cotizaciones/' . $tCot->archivo)) 
            {   Storage::delete('public/cotizaciones/' . $tCot->archivo);} 
            $archivo = $r->file('file');
            // se crea el nombre y una vez guardado se agrega al request para setearlo en el modelo
            $nombreArchivo = time() . '_' . str_replace(' ', '',$archivo->getClientOriginalName());
            if (Storage::put('public/cotizaciones/' . $nombreArchivo, file_get_contents($archivo))) 
            {   $r->merge(['archivo' => $nombreArchivo]);}
        }
        // se pone la fecha de actualizacion al request
        $r->merge(['fa' => Carbon::now()]);
        $tCot->fill($r->all());
        if($tCot->save())
            return response()->json(['estado' => true, 'message' => 'Operacion exitosa.']);
        else
			return response()->json(['estado' => false, 'message' => 'Ocurrio un error.']);
    }
    public function actChangeEstadoCotizacion(Request $r)
    {
        $existeItems = TCotxitm::where('idCot',$r->id)->where('estado','1')->get();
        // se verifica que la cotizacion este activa
        if(count($existeItems)!=0)
        {
            /*
            *   se veirifca q contenga items y 
            *   q cada item contenga los datos necesarios
            *   cantidad y unidad de medida
            */
            $itemsIncompletos = TCotxitm::where('idCot',$r->id)
                ->where('estado','1')
                ->where(function($query) {
                    $query->whereNull('cantidad')
                        ->orWhereNull('idUm');
                })
                ->get();
            // en caso el registro no contenga ningun item nos envia un mensaje de error
            if(count($itemsIncompletos)==0)
            {
                $tCot = TCotizacion::where('idCot',$r->id)->first();
                $tCot->estadoCotizacion = '2';
                if($tCot->save())
                    return response()->json(["estado"=>true, "message"=>"La Cotizacion fue publicada exitosamente."]);
                else
                    return response()->json(["estado"=>false, "message"=>"No se pudo proceder con la publicacion.",]);
            }
            else
                return response()->json(["estado"=>false, "message"=>"Registre la UNIDAD DE MEDIDA Y CANTIDAD de cada item.",]);
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
        // archivo de la cotizacion el cual fue guardado al momento de registrar ña cotizacioon
        $rutaArchivo = storage_path('app/public/cotizaciones/' . $nombreArchivo);
        if (file_exists($rutaArchivo)) 
            return response()->file($rutaArchivo);
        else 
            abort(404); 
    }
}
