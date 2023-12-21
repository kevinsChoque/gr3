<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\TCotrecpro;
use App\Models\TCotizacion;
use App\Models\TRecotizacion;
use App\Models\TDetalleprocot;

// use Codedge\Fpdf\Fpdf\Fpdf;
use Codedge\Fpdf\Fpdf\Fpdf;
use setasign\Fpdi\Fpdi;

class PaCotRecProController extends Controller
{
    public $arrayNombresFiles = array();

    protected $garantia;
    protected $entrega;
    protected $validez;

    protected $razoSocial;
    protected $numeroDocumento;
    protected $direccion;
    protected $celular;
    protected $correo;
    protected $fechaCotizacion;

    protected $totalCotizacion=0;

	public function saveDetalleProCot($r,$idCrp)
    {
        $i=1;
        foreach (json_decode($r->items,true) as $item) 
        {
            $tDpc=new TDetalleprocot();
            $tDpc->idCrp=$idCrp;
            $tDpc->idItm=$item['id'];
            $tDpc->garantia=$item['garantia'];
            $tDpc->marca=$item['marca'];
            $tDpc->modelo=$item['modelo'];
            $tDpc->precio=$item['precio'];
            
            // $tDpc->archivo=$idCrp;
            if($item['archivo']!='no tiene')
            {
                // $this->arrayNombresFiles = array();
                $tDpc->archivo=$idCrp.'_'.$i.'.pdf';
                array_push($this->arrayNombresFiles, $idCrp.'_'.$i);
            }
            if(!$tDpc->save())
            {return false;}
            $i++;
        }
        return true;
    }
    public function actGuardar(Request $r)
    {
        // dd($r->all());

        $tPro = Session::get('proveedor');
        $nombreOferta = $r->idCot.'_'.$tPro->idPro.'.pdf';

        $tRec = TRecotizacion::where('idCot',$r->idCot)->where('estadoRecotizacion','1')->first();
        if($tRec!=null)
        {
            $r->merge(['idRec' => $tRec->idRec]);
        }
        $r->merge(['archivo' => $nombreOferta]);
        $r->merge(['idPro' => $tPro->idPro]);
        $r->merge(['estadoCrp' => '0']);
        $r->merge(['estado' => '1']);
        $r->merge(['fr' => Carbon::now()]);
        DB::beginTransaction();
        // if(TCotrecpro::create($r->all()))
        // if(true)
        $tCrp = TCotrecpro::create($r->all());
        if($tCrp)
        {
            // $this->saveDetalleProCot($r,'3');
            if($this->saveDetalleProCot($r,$tCrp->idCrp))
            {
                // dd(gettype($r->file('archivos')));
                if($r->file('archivos')!==null)
                {
                    for ($i=0; $i < count($r->file('archivos')) ; $i++) 
                    { 
                        $archivo = $r->file('archivos')[$i];
                        $nombreArchivo = $this->arrayNombresFiles[$i]. '.' . $archivo->getClientOriginalExtension();
                        $ruta = Storage::putFileAs('public/ofertas/'.$tPro->idPro.'/'.$tCrp->idCrp.'/', $archivo, $nombreArchivo);
                    }
                }
                DB::commit();
                return response()->json(['estado' => true, 'message' => 'El siguiente paso es para enviar los archivos, sin estos archivos no podra culminar con la COTIZACION y no se tomara en cuenta la postulacion.']);
            }
            else
            {
                DB::rollBack();
                return response()->json(['estado' => false, 'message' => 'Error al registrar la postulacion.']);
            }
        }
        else
        {
            DB::rollBack();
            return response()->json(['estado' => false, 'message' => 'Error al registrar la postulacion']);
        }
    }
    public function actGuardar_last_2funcionalidad_b(Request $r)
    {
        // dd($r->all());
        $tPro = Session::get('proveedor');
        $nombreOferta = $r->idCot.'_'.$tPro->idPro.'.pdf';

        $tRec = TRecotizacion::where('idCot',$r->idCot)->where('estadoRecotizacion','1')->first();
        if($tRec!=null)
        {
            $r->merge(['idRec' => $tRec->idRec]);
        }
        // $tPro = Session::get('proveedor');
        $r->merge(['archivo' => $nombreOferta]);
        $r->merge(['idPro' => $tPro->idPro]);
        $r->merge(['estadoCrp' => '1']);
        $r->merge(['estado' => '1']);
        $r->merge(['fr' => Carbon::now()]);
        DB::beginTransaction();
        // if(TCotrecpro::create($r->all()))
        // if(true)
        $tCrp = TCotrecpro::create($r->all());
        if($tCrp)
        {
            // $this->saveDetalleProCot($r,'3');
            if($this->saveDetalleProCot($r,$tCrp->idCrp))
            {
                // dd(gettype($r->file('archivos')));
                if($r->file('archivos')!==null)
                {
                    for ($i=0; $i < count($r->file('archivos')) ; $i++) 
                    { 
                        $archivo = $r->file('archivos')[$i];
                        $nombreArchivo = $this->arrayNombresFiles[$i]. '.' . $archivo->getClientOriginalExtension();
                        $ruta = Storage::putFileAs('public/ofertas/'.$tPro->idPro.'/'.$tCrp->idCrp.'/', $archivo, $nombreArchivo);
                    }
                }
                $pdfcll = $r->file('pdfCll');
                $pdfdj = $r->file('pdfDj');
                $pdfcci = $r->file('pdfCci');
                $pdfanexo = $r->file('pdfAnexo5');

                // Crear una instancia de Fpdi
                $pdf = new Fpdi();

                // Combinar pdfcll
                $pdf->setSourceFile($pdfcll->path());
                for ($pagina = 1; $pagina <= $pdf->setSourceFile($pdfcll->path()); $pagina++) {
                    $tplIdx = $pdf->importPage($pagina);
                    $pdf->AddPage();
                    $pdf->useTemplate($tplIdx);
                }

                // Combinar pdfdj
                $pdf->setSourceFile($pdfdj->path());
                for ($pagina = 1; $pagina <= $pdf->setSourceFile($pdfdj->path()); $pagina++) {
                    $tplIdx = $pdf->importPage($pagina);
                    $pdf->AddPage();
                    $pdf->useTemplate($tplIdx);
                }

                // Combinar pdfcci
                $pdf->setSourceFile($pdfcci->path());
                for ($pagina = 1; $pagina <= $pdf->setSourceFile($pdfcci->path()); $pagina++) {
                    $tplIdx = $pdf->importPage($pagina);
                    $pdf->AddPage();
                    $pdf->useTemplate($tplIdx);
                }

                // Combinar pdfanexo
                $pdf->setSourceFile($pdfanexo->path());
                for ($pagina = 1; $pagina <= $pdf->setSourceFile($pdfanexo->path()); $pagina++) {
                    $tplIdx = $pdf->importPage($pagina);
                    $pdf->AddPage();
                    $pdf->useTemplate($tplIdx);
                }

                // $nombreOferta = $r->idCot.'_'.$tPro->idPro.'.pdf';

                // Ruta para el PDF combinado
                // $joinPdf = storage_path('app/public/juntarPdfs/'.$nombreOferta);
                $joinPdf = storage_path('app/public/ofertas/'.$tPro->idPro.'/'.$tCrp->idCrp.'/'.$nombreOferta);
                // $ruta = Storage::putFileAs('public/ofertas/'.$tPro->idPro.'/'.$tCrp->idCrp.'/', $archivo, $nombreArchivo);

                $pdf->Output($joinPdf, 'F');
                DB::commit();
                return response()->json(['estado' => true, 'message' => 'Se registro la postulacion correctamente']);
            }
            else
            {
                DB::rollBack();
                return response()->json(['estado' => false, 'message' => 'Error al registrar la postulacion.']);
            }
        }
        else
        {
            DB::rollBack();
            return response()->json(['estado' => false, 'message' => 'Error al registrar la postulacion']);
        }
    }
    public function actGuardar_b(Request $r)
    {
        
        // if ($r->hasFile('pdfDj')) 
        // {
        //     $archivo = $r->file('pdfDj');
        //     $nombreArchivo = time() . '_' . str_replace(' ', '',$archivo->getClientOriginalName());
        //     if (Storage::put('public/juntarPdfs/' . $nombreArchivo, file_get_contents($archivo))) 
        //     {
                
        //     } 
        //     else 
        //     {
        //         DB::rollBack();
        //         return response()->json(['estado' => false, 'message' => 'Error al guardar el archivo, no se registro la cotización']);
        //     }
        // }
        // --------------------------
        // $arc = $r->file('archivos');
        // dd($arc[0]);
        // dd(count($arc));
        $tPro = Session::get('proveedor');

        $pdfcll = $r->file('pdfCll');
        $pdfdj = $r->file('pdfDj');
        $pdfcci = $r->file('pdfCci');
        $pdfanexo = $r->file('pdfAnexo5');

        // Crear una instancia de Fpdi
        $pdf = new Fpdi();

        // Combinar pdfcll
        $pdf->setSourceFile($pdfcll->path());
        for ($pagina = 1; $pagina <= $pdf->setSourceFile($pdfcll->path()); $pagina++) {
            $tplIdx = $pdf->importPage($pagina);
            $pdf->AddPage();
            $pdf->useTemplate($tplIdx);
        }

        // Combinar pdfdj
        $pdf->setSourceFile($pdfdj->path());
        for ($pagina = 1; $pagina <= $pdf->setSourceFile($pdfdj->path()); $pagina++) {
            $tplIdx = $pdf->importPage($pagina);
            $pdf->AddPage();
            $pdf->useTemplate($tplIdx);
        }

        // Combinar pdfcci
        $pdf->setSourceFile($pdfcci->path());
        for ($pagina = 1; $pagina <= $pdf->setSourceFile($pdfcci->path()); $pagina++) {
            $tplIdx = $pdf->importPage($pagina);
            $pdf->AddPage();
            $pdf->useTemplate($tplIdx);
        }

        // Combinar pdfanexo
        $pdf->setSourceFile($pdfanexo->path());
        for ($pagina = 1; $pagina <= $pdf->setSourceFile($pdfanexo->path()); $pagina++) {
            $tplIdx = $pdf->importPage($pagina);
            $pdf->AddPage();
            $pdf->useTemplate($tplIdx);
        }

        $nombreOferta = $r->idCot.'_'.$tPro->idPro.'.pdf';

        // Ruta para el PDF combinado
        $joinPdf = storage_path('app/public/juntarPdfs/'.$nombreOferta);
        // $joinPdf = storage_path('app/public/ofertas/'.$tPro->idPro.'/'.$tCrp->idCrp.'/'.$nombreOferta);
        // $ruta = Storage::putFileAs('public/ofertas/'.$tPro->idPro.'/'.$tCrp->idCrp.'/', $archivo, $nombreArchivo);

        // Guardar el PDF combinado
        // $pdf->Output($joinPdf, 'F');
        // if(Storage::exists('public/juntarPdfs/'.$nombreOferta))
        // if ($pdf->Output($joinPdf, 'F'))
        if(true)
        {
             $tRec = TRecotizacion::where('idCot',$r->idCot)->where('estadoRecotizacion','1')->first();
            if($tRec!=null)
            {
                $r->merge(['idRec' => $tRec->idRec]);
            }
            // $tPro = Session::get('proveedor');
            $r->merge(['archivo' => $nombreOferta]);
            $r->merge(['idPro' => $tPro->idPro]);
            $r->merge(['estadoCrp' => '0']);
            $r->merge(['estado' => '1']);
            $r->merge(['fr' => Carbon::now()]);
            DB::beginTransaction();
            // if(TCotrecpro::create($r->all()))
            // if(true)
            $tCrp = TCotrecpro::create($r->all());
            if($tCrp)
            {
                // $this->saveDetalleProCot($r,'3');
                if($this->saveDetalleProCot($r,$tCrp->idCrp))
                {
                    // dd(gettype($r->file('archivos')));
                    if($r->file('archivos')!==null)
                    {
                        for ($i=0; $i < count($r->file('archivos')) ; $i++) 
                        { 
                            $archivo = $r->file('archivos')[$i];
                            $nombreArchivo = $this->arrayNombresFiles[$i]. '.' . $archivo->getClientOriginalExtension();
                            $ruta = Storage::putFileAs('public/ofertas/'.$tPro->idPro.'/'.$tCrp->idCrp.'/', $archivo, $nombreArchivo);
                        }
                    }
                    DB::commit();
                    return response()->json(['estado' => true, 'message' => 'Se registro la postulacion correctamente']);
                }
                else
                {
                    DB::rollBack();
                    return response()->json(['estado' => false, 'message' => 'Error al registrar la postulacion.']);
                }
            }
            else
            {
                DB::rollBack();
                return response()->json(['estado' => false, 'message' => 'Error al registrar la postulacion']);
            }
        }
        DB::rollBack();
        return response()->json(['estado' => false, 'message' => 'Error al guardar los archivos-.']);
        // return response()->json(['joinPdf' => $joinPdf]);
        // ---------------------------------------------
        // ---------------------------------------------
        // ---------------------------------------------
    }
    public function actListar()
    {
    	$tPro = Session::get('proveedor');
    	$registros = TCotrecpro::select('cotizacion.*','cotrecpro.fr as frCrp','cotrecpro.estadoCrp','cotrecpro.idCrp','cotrecpro.total')
            ->leftjoin('cotizacion', 'cotizacion.idCot', '=', 'cotrecpro.idCot')
            ->where('cotrecpro.idPro', $tPro->idPro)
            ->orderBy('cotrecpro.idCrp', 'desc')
            ->get();
        return response()->json(["data"=>$registros]);
    }
    public function actSearch(Request $r)
    {
        $anio='';$mes='';$tipo='';
        if(!is_null($r->anio) && $r->anio!=0)
        {$anio=" AND YEAR(p.fr) = ".$r->anio;}
        if(!is_null($r->mes) && $r->mes!=0)
        {$mes=" AND MONTH(p.fr) = ".$r->mes;}
        if(!is_null($r->tipo) && $r->tipo!=0)
        {$tipo=" AND c.tipo = '".$r->tipo."' ";}
        $p = Session::get('proveedor');
        $sql = "SELECT c.*, p.fr AS frCrp, p.estadoCrp, p.idCrp, p.total 
            FROM cotrecpro p
            LEFT JOIN cotizacion c ON c.idCot = p.idCot 
            WHERE p.idPro = ".$p->idPro.$anio.$mes.$tipo." ORDER BY p.idCrp DESC";
        $registros=DB::select($sql);
        return response()->json(["data"=>$registros]);
    }
    public function actSubirArchivo(Request $r)
    {
        // dd($r->soloPdf==true);
        // dd($r->all());
    	DB::beginTransaction();
        if($r->soloPdf=='true')
        {
            // dd('entro aki solo uno');
        	if ($r->hasFile('pdfAll')) 
        	{
        		$archivo = $r->file('pdfAll');
                $nombreArchivo = time() . '_' . str_replace(' ', '',$archivo->getClientOriginalName());
                // $rutaArchivo = storage_path('app/public/ofertas/'.$idPro.'/'.$idCrp.'/35_47.pdf');
    	        // if (Storage::put('public/panel_administrativo/proveedor/cotizaciones/' . $nombreArchivo, file_get_contents($archivo))) 
                $p = Session::get('proveedor');
                if (Storage::put('public/ofertas/'.$p->idPro.'/'.$r->idCrp.'/' . $nombreArchivo, file_get_contents($archivo))) 
    	        {

                    $r->merge(['estadoCrp' => '1']);
    	        	$r->merge(['archivo' => $nombreArchivo]);
    	        	$tCrp = TCotrecpro::find($r->idCrp);
    	        	// dd($r->idCrp);
    	        	$tCrp->fill($r->all());
    	        	// if(TCotizacion::create($r->all()))
            		if($tCrp->save())
    	        	{
    	        		DB::commit();
    	        		return response()->json(['estado' => true, 'message' => 'Se envio la cotizacion exitosamente.']);
    	        	}
    	        	else
    	        	{
    	        		DB::rollBack();
    	        		return response()->json(['estado' => false, 'message' => 'Error al registrar el envio de la cotizacion.']);
    	        	}
    	        } 
    	        else 
    	        {
    	        	DB::rollBack();
    	        	return response()->json(['estado' => false, 'message' => 'Error al guardar el archivo de cotizacion']);
    	        }
            }
            DB::rollBack();
            return response()->json(['estado' => false, 'message' => 'Ingrese un archivo de cotización.']);
        }
        else
        {
            // dd('entro aki varios');
            $nombreArchivo = time() . '.pdf';
            $p = Session::get('proveedor');
            $pdfcll = $r->file('pdfCll');
            $pdfdj = $r->file('pdfDj');
            $pdfcci = $r->file('pdfCci');
            $pdfanexo = $r->file('pdfA5');

            // Crear una instancia de Fpdi
            $pdf = new Fpdi();

            // Combinar pdfcll
            $pdf->setSourceFile($pdfcll->path());
            for ($pagina = 1; $pagina <= $pdf->setSourceFile($pdfcll->path()); $pagina++) {
                $tplIdx = $pdf->importPage($pagina);
                $pdf->AddPage();
                $pdf->useTemplate($tplIdx);
            }

            // Combinar pdfdj
            $pdf->setSourceFile($pdfdj->path());
            for ($pagina = 1; $pagina <= $pdf->setSourceFile($pdfdj->path()); $pagina++) {
                $tplIdx = $pdf->importPage($pagina);
                $pdf->AddPage();
                $pdf->useTemplate($tplIdx);
            }

            // Combinar pdfcci
            $pdf->setSourceFile($pdfcci->path());
            for ($pagina = 1; $pagina <= $pdf->setSourceFile($pdfcci->path()); $pagina++) {
                $tplIdx = $pdf->importPage($pagina);
                $pdf->AddPage();
                $pdf->useTemplate($tplIdx);
            }

            // Combinar pdfanexo
            $pdf->setSourceFile($pdfanexo->path());
            for ($pagina = 1; $pagina <= $pdf->setSourceFile($pdfanexo->path()); $pagina++) {
                $tplIdx = $pdf->importPage($pagina);
                $pdf->AddPage();
                $pdf->useTemplate($tplIdx);
            }
            
            $joinPdf = storage_path('app/public/ofertas/'.$p->idPro.'/'.$r->idCrp.'/'.$nombreArchivo);

            $pdf->Output($joinPdf, 'F');
            $r->merge(['estadoCrp' => '1']);
            $r->merge(['archivo' => $nombreArchivo]);
            $tCrp = TCotrecpro::find($r->idCrp);
            // dd($r->idCrp);
            $tCrp->fill($r->all());
            // if(TCotizacion::create($r->all()))
            if($tCrp->save())
            {
                DB::commit();
                return response()->json(['estado' => true, 'message' => 'Se envio la cotizacion exitosamente.']);
            }
            else
            {
                DB::rollBack();
                return response()->json(['estado' => false, 'message' => 'Error al registrar el envio de la cotizacion.']);
            }
        }
    }
    public function verArchivo($idPro,$idCrp,$nombreArchivo)
    {
        // dd($idCrp);
        // $rutaArchivo = storage_path('app/public/panel_administrativo/proveedor/cotizaciones/' . $nombreArchivo);
        $rutaArchivo = storage_path('app/public/ofertas/'.$idPro.'/'.$idCrp.'/35_47.pdf');
        if (file_exists($rutaArchivo)) 
            return response()->file($rutaArchivo);
        else 
            abort(404); 
    }
    // public function actGenerarCot(Request $r)
    // {   
    //     dd($r->all());
    // }
    public function actGenerarCot(Request $r)
    {
        $items = json_decode($r->data,true);
        // dd($items[0]['nombre']);
        // for ($i=0; $i < count($items); $i++) 
        // {
        //     echo $items[$i]['nombre'].'<br>';
        // }
        // exit();
        // -------------------------
        $p = Session::get('proveedor');
        $this->razoSocial = strtoupper($p->tipoPersona="PERSONA NATURAL"?
            $p->nombre.' '.$p->apellidoPaterno.' '.$p->apellidoMaterno:
            $p->nombreRep.' '.$p->apellidoPaternoRep.' '.$p->apellidoMaternoRep);
        $this->numeroDocumento = $p->numeroDocumento;
        $this->direccion = $p->direccion;
        $this->celular = $p->celular;
        $this->correo = $p->correo;
        // $correo = $p->fechaCoti;
        
        $tCot = TCotizacion::find($r->idCot);
        // dd($r->all());

        $diaA = date('d');
        $mesA = date('m');
        $anioA = date('Y');
        $this->fechaCotizacion = $tCot->fechaCotizacion;

        $garantia = $r->tGarantia;
        $validez = $r->tValidez;
        $entrega = $r->tEntrega;

        // $totalCotizacion = 0;
        
        // $nombre = 'csacasc';
        // $dni = '47655230';
        $marco = 0;
        $smarco = 1;
        $ssmarco = 1;
        $blanco = '';
        $fondo = true;
        $tam = 3.5;
        $sl = 2;
// --recoger
        $pdf = new Fpdf('P','mm','a4');
        $pdf->AddPage();
        // --------------------cabecera
        $pdf->Image('img/panelAdm/logoFile.png',10,10,18);
        $pdf->SetFont('Arial','B',9);
        $pdf->text(33,13.5,utf8_decode('GOBIERNO REGIONAL DE APURIMAC'));
        $pdf->Cell(190,5,utf8_decode(''),$marco,1,'L');
        $pdf->SetFont('Arial','',6);
        $pdf->text(38,17,utf8_decode('OFICINA DE ABASTECIMIENTO Y SERVICIOS'));
        $pdf->text(54,20.5,utf8_decode('AUXILIARES'));
        $pdf->Cell(190,3,'',$marco,1,'C');
        $pdf->Cell(190,3,'',$marco,1,'C');

        $pdf->SetFont('Arial','',11);
        $pdf->Rect(180, 10, 20, 9, 'D');
        $pdf->Rect(160, 10, 20, 9, 'D');
        $pdf->text(183.5,14,utf8_decode('FECHA'));
        $pdf->text(166,14,utf8_decode('AÑO'));
        $pdf->SetFont('Arial','',10);
        $pdf->text(181,18,utf8_decode($diaA.'/'.$mesA.'/'.$anioA));
        $pdf->text(166,18,utf8_decode($anioA));
        $pdf->ln(12);
// ------titulo
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,6,utf8_decode('SOLICITUD DE COTIZACION'),$marco,1,'C');
        $pdf->ln(9);
// ------primera seccion
    $pdf->SetFont('Arial','',9);
        $pdf->Rect(10, 46, 190, 35, 'D');
        $pdf->Cell(3,$tam+2,'',$marco,0,'L');
        $pdf->Cell(30,$tam+2,utf8_decode('RAZON SOCIAL:'),$marco,0,'L');
        $pdf->Cell(70,$tam+2,utf8_decode('________________________________________'),$marco,0,'L');
        $pdf->Cell(25,$tam+2,utf8_decode('RUC:'),$marco,0,'L');
        $pdf->Cell(59,$tam+2,utf8_decode('________________________________'),$marco,0,'L');
        $pdf->Cell(3,$tam+2,'',$marco,1,'L');

        $pdf->Cell(3,$tam+2,'',$marco,0,'L');
        $pdf->Cell(30,$tam+2,utf8_decode('DIRECCION:'),$marco,0,'L');
        $pdf->Cell(48,$tam+2,utf8_decode('____________________________'),$marco,0,'L');
        $pdf->Cell(22,$tam+2,utf8_decode('TELEFONO:'),$marco,0,'L');
        $pdf->Cell(25,$tam+2,utf8_decode('_______________'),$marco,0,'L');
        $pdf->Cell(14,$tam+2,utf8_decode('EMAIL:'),$marco,0,'L');
        $pdf->Cell(45,$tam+2,utf8_decode('________________________'),$marco,0,'L');
        $pdf->Cell(3,$tam+2,'',$marco,1,'L');

        $pdf->Cell(3,$tam+2,'',$marco,0,'L');
        $pdf->Cell(30,$tam+2,utf8_decode('REFERENCIA:'),$marco,0,'L');
        $pdf->Cell(154,$tam+2,utf8_decode('______________________________________________________________________________________'),$marco,0,'L');
        $pdf->Cell(3,$tam+2,'',$marco,1,'L');

        $pdf->Cell(3,$tam+2,'',$marco,0,'L');
        $pdf->Cell(30,$tam+2,utf8_decode('Nª META:'),$marco,0,'L');
        $pdf->Cell(154,$tam+2,utf8_decode('______________________________________________________________________________________'),$marco,0,'L');
        $pdf->Cell(3,$tam+2,'',$marco,1,'L');

        $pdf->Cell(3,$tam+2,'',$marco,0,'L');
        $pdf->MultiCell(184,$tam+2, utf8_decode('Por medio de la presente sirvase cotizar los siguientes items correspondientes al cuadro de contrataciones Nro. 844 de fecha'), $marco, 'J');

        $pdf->Cell(3,$tam+2,'',$marco,0,'L');
        $pdf->SetFont('Arial','B',9);
        $pdf->Cell(18,$tam+2,utf8_decode($this->fechaCotizacion),$marco,1,'L');
        $pdf->ln(3);
// data------------------------------------------------------------------------------
         
        $pdf->text(45,51,utf8_decode($this->razoSocial));
        $pdf->text(140,51,utf8_decode($this->numeroDocumento));
        $pdf->text(45,56.6,utf8_decode($this->direccion));
        $pdf->text(115,56.6,utf8_decode($this->celular));
        $pdf->text(154,56.6,utf8_decode($this->correo));
// data------------------------------------------------------------------------------
// items
        $pdf->Rect(10, 84, 10, 129.6, 'D');
        $pdf->Rect(20, 84, 15, 129.6, 'D');
        $pdf->Rect(35, 84, 15, 129.6, 'D');
        $pdf->Rect(50, 84, 75, 129.6, 'D');
        $pdf->Rect(125, 84, 15, 129.6, 'D');
        $pdf->Rect(140, 84, 20, 129.6, 'D');
        $pdf->Rect(160, 84, 20, 129.6, 'D');
        $pdf->Rect(180, 84, 20, 129.6, 'D');

        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(10,$tam+6,utf8_decode('ITEM'),$ssmarco,0,'C');
        $pdf->Cell(15,$tam+6,utf8_decode('CANT'),$ssmarco,0,'C');
        $pdf->Cell(15,$tam+6,utf8_decode('UMD'),$ssmarco,0,'C');
        $pdf->Cell(75,$tam+6,utf8_decode('DESCRIPCION'),$ssmarco,0,'C');
        $pdf->Cell(15,$tam+6,utf8_decode('MARCA'),$ssmarco,0,'C');
        $pdf->Cell(20,$tam+6,utf8_decode('MODELO'),$ssmarco,0,'C');
        $pdf->Cell(20,$tam+6,utf8_decode('P.V'),$ssmarco,0,'C');
        $pdf->Cell(20,$tam+6,utf8_decode('SUBTOTAL'),$ssmarco,1,'C');
        // -----
        $pdf->SetFont('Arial','',8);
        $parrafo = 'Este es un texto largo que ocupa varias líneas. ';
        $parrafo2 = 'Este es un texto largo que ocupa vars líneas rs líneas c';
        
        $alcance = 0;
        // ---------------------------------
// -------------------------------------------------------------s only test
        // unset($items);
        // for ($i = 0; $i < 29; $i++) {
        //     $item = [
        //         'nombre' => 'Producto ' . $i,
        //         'cant' => 1,
        //         // 'cant' => rand(1, 10),
        //         'um' => 'Unidad',
        //         'marca' => 'Marca ' . $i,
        //         'modelo' => 'Modelo ' . $i,
        //         'precio' => 1,
        //         // 'precio' => rand(10, 100),
        //     ];
        //     $items[] = $item;
        // }
// -------------------------------------------------------------e only test
        for ($i=0; $i < count($items); $i++) 
        { 
            $tam = 4;
            $tam2 = 4;
            if(strlen($items[$i]['nombre'])>53)
            {
                $mul = intval(strlen($items[$i]['nombre']) / 53)+1;
            }
            else
            {
                $mul = 1;
            }
            $alcance = $alcance + $mul;
            if($alcance>30)
            {
                $lispar2 = array_slice($items, $i);
                // $pdf->text(150,42,'nuevo array tiene->'.count($lispar2));
                // $pdf->text(120,42,'mul->'.$mul);
                // $pdf->text(120,44,'alcance->'.$alcance);
                // $pdf->text(120,46,'cant lista->'.count($items));
                $this->garantia = $garantia;
                $this->entrega = $entrega;
                $this->validez = $validez;
                $pdf->AddPage();
                $this->cot($pdf,$lispar2);
                break;
            }
            $tam = $tam*$mul;

            $xPosition = $pdf->GetX();
            $yPosition = $pdf->GetY();

            $pdf->Cell(10,$tam,utf8_decode($i),$ssmarco,0,'C');
            $pdf->Cell(15,$tam,number_format($items[$i]['cant'],2),$ssmarco,0,'C');
            $pdf->Cell(15,$tam,utf8_decode($items[$i]['um']),$ssmarco,0,'C');
            $pdf->MultiCell(75, $tam2, utf8_decode($items[$i]['nombre'].strlen($items[$i]['nombre'])),$ssmarco);
            $pdf->SetY($yPosition);
            $pdf->SetX($xPosition+115);
            $pdf->Cell(15,$tam,utf8_decode($items[$i]['marca']),$ssmarco,0,'C');
            $pdf->Cell(20,$tam,utf8_decode($items[$i]['modelo']),$ssmarco,0,'C');
            $pdf->Cell(20,$tam,number_format($items[$i]['precio'],2),$ssmarco,0,'C');
            $st = $items[$i]['cant']*$items[$i]['precio'];
            $this->totalCotizacion = $this->totalCotizacion + $st;
            $pdf->Cell(20,$tam,'S/. '.number_format($st,2),$ssmarco,1,'C');

        }

        // $pdf->text(95,250,$alcance.'---');
        // $pdf->Output();
        // exit;
        $tam = 3.5;
        $pdf->ln(20);
        // 108
        $pdf->SetFont('Arial','B',9);
        // --------------------------------------------------------------
        $pdf->Rect(160, 213.6, 20, 6.6, 'D');
        $pdf->Rect(180, 213.6, 20, 6.6, 'D');
        $pdf->text(166,218,utf8_decode('Total'));
        $pdf->text(184,218,'S/. '.number_format($this->totalCotizacion,2));
        // --------------------------------------------------------------
        // $pdf->Cell(150,$tam+3,utf8_decode('-'),0,0,'C');
        // $pdf->Cell(20,$tam+3,utf8_decode('Total'),$ssmarco,0,'C');
        // $pdf->Cell(20,$tam+3,'S/. '.number_format($totalCotizacion,2),$ssmarco,1,'C');
        // $pdf->ln(3);

        // --------------------------------------------------------------

        $pdf->text(14,222.3,utf8_decode('La cotizaciones deben estar dirigidas a GOBIERNO REGIONAL DE APURIMAC - SEDE CENTRAL'));
        $pdf->text(14,226,utf8_decode('en la siguiente direccion: JR. PUNO Nª 107 Telefono: 083-321022'));
        $pdf->text(14,229.7,utf8_decode('Condicion de compra'));
        $pdf->text(14,233.4,utf8_decode('- Forma de Pago: CCI'));
        $pdf->text(14,237.1,utf8_decode('- Garantia: '.$garantia));
        $pdf->text(14,240.8,utf8_decode('- La Cotizacion debe incluir el I.G.V.:'));
        $pdf->text(14,244.5,utf8_decode('- Plazo de entrega / Ejecucion de Servicio: '.$entrega));
        $pdf->text(14,248.2,utf8_decode('- Tipo de Moneda:'));
        $pdf->text(14,251.9,utf8_decode('- Validez de la cotizacion: '.$validez));
        $pdf->text(14,255.6,utf8_decode('- Remitir junto con su cotizacion la Declaracion Jurada y Pacto de Integridad, debidamente firmadas y selladas.'));
        $pdf->text(14,259.3,utf8_decode('- Indicar su razon social, domicilio fiscal y numero de RUC:'));

        // --------------------------------------------------------------
        $pdf->text(84,277,utf8_decode('____________________________'));
        $pdf->text(93,280.3,utf8_decode('Area de Loguistica'));

        $pdf->Output();
        exit;
    }
    function cot($pdf,$lispar)
    {
        $p = Session::get('proveedor');

        $nombre = 'csacasc';
        $dni = '47655230';

        $marco = 0;
        $smarco = 1;
        $ssmarco = 1;
        $blanco = '';
        $fondo = true;
        $tam = 3.5;
        $sl = 2;

        $diaA = date('d');
        $mesA = date('m');
        $anioA = date('Y');

        $garantia = $this->garantia;
        $entrega = $this->entrega;
        $validez = $this->validez;

// cabecera
        $pdf->Image('img/panelAdm/logoFile.png',10,10,18);
        $pdf->SetFont('Arial','B',9);
        $pdf->text(33,13.5,utf8_decode('GOBIERNO REGIONAL DE APURIMAC'));
        $pdf->Cell(190,5,'',$marco,1,'L');
        $pdf->SetFont('Arial','',6);
        $pdf->text(38,17,utf8_decode('OFICINA DE ABASTECIMIENTO Y SERVICIOS'));
        $pdf->text(54,20.5,utf8_decode('AUXILIARES'));
        $pdf->Cell(190,3,'',$marco,1,'C');
        $pdf->Cell(190,3,'',$marco,1,'C');

        $pdf->SetFont('Arial','',11);
        $pdf->Rect(180, 10, 20, 9, 'D');
        $pdf->Rect(160, 10, 20, 9, 'D');
        $pdf->text(183.5,14,utf8_decode('FECHA'));
        $pdf->text(166,14,utf8_decode('AÑO'));
        $pdf->SetFont('Arial','',10);
        $pdf->text(181,18,utf8_decode($diaA.'/'.$mesA.'/'.$anioA));
        $pdf->text(166,18,utf8_decode($anioA));
        $pdf->ln(12);
// fin de cabecera
// titulo
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,6,utf8_decode('SOLICITUD DE COTIZACION'),$marco,1,'C');
        $pdf->ln(9);
// fin de titulo
// primera seccion
        $pdf->SetFont('Arial','',9);
        $pdf->Rect(10, 46, 190, 35, 'D');
        $pdf->Cell(3,$tam+2,'',$marco,0,'L');
        $pdf->Cell(30,$tam+2,utf8_decode('RAZON SOCIAL:'),$marco,0,'L');
        $pdf->Cell(70,$tam+2,utf8_decode('________________________________________'),$marco,0,'L');
        $pdf->Cell(25,$tam+2,utf8_decode('RUC:'),$marco,0,'L');
        $pdf->Cell(59,$tam+2,utf8_decode('________________________________'),$marco,0,'L');
        $pdf->Cell(3,$tam+2,'',$marco,1,'L');

        $pdf->Cell(3,$tam+2,'',$marco,0,'L');
        $pdf->Cell(30,$tam+2,utf8_decode('DIRECCION:'),$marco,0,'L');
        $pdf->Cell(48,$tam+2,utf8_decode('____________________________'),$marco,0,'L');
        $pdf->Cell(22,$tam+2,utf8_decode('TELEFONO:'),$marco,0,'L');
        $pdf->Cell(25,$tam+2,utf8_decode('_______________'),$marco,0,'L');
        $pdf->Cell(14,$tam+2,utf8_decode('EMAIL:'),$marco,0,'L');
        $pdf->Cell(45,$tam+2,utf8_decode('________________________'),$marco,0,'L');
        $pdf->Cell(3,$tam+2,'',$marco,1,'L');

        $pdf->Cell(3,$tam+2,'',$marco,0,'L');
        $pdf->Cell(30,$tam+2,utf8_decode('REFERENCIA:'),$marco,0,'L');
        $pdf->Cell(154,$tam+2,utf8_decode('______________________________________________________________________________________'),$marco,0,'L');
        $pdf->Cell(3,$tam+2,'',$marco,1,'L');

        $pdf->Cell(3,$tam+2,'',$marco,0,'L');
        $pdf->Cell(30,$tam+2,utf8_decode('Nª META:'),$marco,0,'L');
        $pdf->Cell(154,$tam+2,utf8_decode('______________________________________________________________________________________'),$marco,0,'L');
        $pdf->Cell(3,$tam+2,'',$marco,1,'L');

        $pdf->Cell(3,$tam+2,'',$marco,0,'L');
        $pdf->MultiCell(184,$tam+2, utf8_decode('Por medio de la presente sirvase cotizar los siguientes items correspondientes al cuadro de contrataciones Nro. 844 de fecha'), $marco, 'J');
// data------------------------------------------------------------------------------
         $pdf->SetFont('Arial','B',9);
        $pdf->text(45,51,utf8_decode($this->razoSocial));
        $pdf->text(140,51,utf8_decode($this->numeroDocumento));
        $pdf->text(45,56.6,utf8_decode($this->direccion));
        $pdf->text(115,56.6,utf8_decode($this->celular));
        $pdf->text(154,56.6,utf8_decode($this->correo));
        $pdf->SetFont('Arial','',9);
// data------------------------------------------------------------------------------
        $pdf->Cell(3,$tam+2,'',$marco,0,'L');
        $pdf->SetFont('Arial','B',9);
        // $pdf->Cell(18,$tam+2,utf8_decode('03/03/6666'),$marco,1,'L');
        $pdf->Cell(18,$tam+2,utf8_decode($this->fechaCotizacion),$marco,1,'L');
        $pdf->ln(3);
// fin de primera seccion

// ---------------------------------------------------------------items
// esquema
        $pdf->Rect(10, 84, 10, 129.6, 'D');
        $pdf->Rect(20, 84, 15, 129.6, 'D');
        $pdf->Rect(35, 84, 15, 129.6, 'D');
        $pdf->Rect(50, 84, 75, 129.6, 'D');
        $pdf->Rect(125, 84, 15, 129.6, 'D');
        $pdf->Rect(140, 84, 20, 129.6, 'D');
        $pdf->Rect(160, 84, 20, 129.6, 'D');
        $pdf->Rect(180, 84, 20, 129.6, 'D');
// fin de esquema

// cabezera de tabla
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(10,$tam+6,utf8_decode('ITEM'),$ssmarco,0,'C');
        $pdf->Cell(15,$tam+6,utf8_decode('CANT'),$ssmarco,0,'C');
        $pdf->Cell(15,$tam+6,utf8_decode('UMD'),$ssmarco,0,'C');
        $pdf->Cell(75,$tam+6,utf8_decode('DESCRIPCION'),$ssmarco,0,'C');
        $pdf->Cell(15,$tam+6,utf8_decode('MARCA'),$ssmarco,0,'C');
        $pdf->Cell(20,$tam+6,utf8_decode('MODELO'),$ssmarco,0,'C');
        $pdf->Cell(20,$tam+6,utf8_decode('P.V'),$ssmarco,0,'C');
        $pdf->Cell(20,$tam+6,utf8_decode('SUBTOTAL'),$ssmarco,1,'C');
// fin de cabera de tabla

// lista
        $pdf->SetFont('Arial','',8);
        $alcance = 0;
        for ($i=0; $i < count($lispar); $i++) 
        { 
            $tam = 4;
            $tam2 = 4;
            if(strlen($lispar[$i]['nombre'])>53)
            {
                $mul = intval(strlen($lispar[$i]['nombre']) / 53)+1;
            }
            else
            {
                $mul = 1;
            }
            $alcance = $alcance + $mul;
            if($alcance>30)
            {
                $lispar2 = array_slice($lispar, $i);
                $pdf->text(150,42,'nuevo array tiene->'.count($lispar2));

                $pdf->text(120,42,'mul->'.$mul);
                $pdf->text(120,44,'alcance->'.$alcance);
                $pdf->text(120,46,'cant lista->'.count($lispar));
                $pdf->AddPage();
                $this->cot($pdf,$lispar2);
                break;
            }
            $tam = $tam*$mul;

            $xPosition = $pdf->GetX();
            $yPosition = $pdf->GetY();

            $pdf->Cell(10,$tam,utf8_decode($i),$ssmarco,0,'C');
            $pdf->Cell(15,$tam,number_format($lispar[$i]['cant'],2),$ssmarco,0,'C');
            $pdf->Cell(15,$tam,utf8_decode($lispar[$i]['um']),$ssmarco,0,'C');
            $pdf->MultiCell(75, $tam2, utf8_decode($lispar[$i]['nombre'].strlen($lispar[$i]['nombre'])),$ssmarco);
            $pdf->SetY($yPosition);
            $pdf->SetX($xPosition+115);
            $pdf->Cell(15,$tam,utf8_decode($lispar[$i]['marca']),$ssmarco,0,'C');
            $pdf->Cell(20,$tam,utf8_decode($lispar[$i]['modelo']),$ssmarco,0,'C');
            $pdf->Cell(20,$tam,number_format($lispar[$i]['precio'],2),$ssmarco,0,'C');
            $st = $lispar[$i]['cant']*$lispar[$i]['precio'];
            $this->totalCotizacion = $this->totalCotizacion + $st;
            $pdf->Cell(20,$tam,'S/. '.number_format($st,2),$ssmarco,1,'C');
        }
// fin de lista
        // --------------------------------------------------------
        $pdf->Rect(160, 213.6, 20, 6.6, 'D');
        $pdf->Rect(180, 213.6, 20, 6.6, 'D');
        $pdf->text(166,218,utf8_decode('Total'));
        $pdf->text(184,218,'S/. '.number_format($this->totalCotizacion,2));
        // --------------------------------------------------------

        $pdf->text(14,222.3,utf8_decode('La cotizaciones deben estar dirigidas a GOBIERNO REGIONAL DE APURIMAC - SEDE CENTRAL'));
        $pdf->text(14,226,utf8_decode('en la siguiente direccion: JR. PUNO Nª 107 Telefono: 083-321022'));
        $pdf->text(14,229.7,utf8_decode('Condicion de compra'));
        $pdf->text(14,233.4,utf8_decode('- Forma de Pago: CCI'));
        $pdf->text(14,237.1,utf8_decode('- Garantia: '.$garantia));
        $pdf->text(14,240.8,utf8_decode('- La Cotizacion debe incluir el I.G.V.:'));
        $pdf->text(14,244.5,utf8_decode('- Plazo de entrega / Ejecucion de Servicio: '.$entrega));
        $pdf->text(14,248.2,utf8_decode('- Tipo de Moneda:'));
        $pdf->text(14,251.9,utf8_decode('- Validez de la cotizacion: '.$validez));
        $pdf->text(14,255.6,utf8_decode('- Remitir junto con su cotizacion la Declaracion Jurada y Pacto de Integridad, debidamente firmadas y selladas.'));
        $pdf->text(14,259.3,utf8_decode('- Indicar su razon social, domicilio fiscal y numero de RUC:'));

        $pdf->text(84,277,utf8_decode('____________________________'));
        $pdf->text(93,280.3,utf8_decode('Area de Loguistica'));
        // ------------------------------------------------------------------------
        $pdf->Output();
        exit;
    }
}
