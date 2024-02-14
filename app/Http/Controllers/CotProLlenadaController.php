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
use App\Models\TItem;//borrar
use Codedge\Fpdf\Fpdf\Fpdf;
use setasign\Fpdi\Fpdi;

class CotProLlenadaController extends Controller
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

    public function actShow(Request $r)
    {
    	$registro = TCotrecpro::where('idCrp',$r->idCrp)->first();
		// dd($registro);
        return response()->json(["data"=>$registro]);
    }
    public function actGenerarCot(Request $r)
    {
        $p = Session::get('proveedor');
		$items = TDetalleprocot::select('detalleprocot.*','cotxitm.*','item.*','unidadmedida.nombre as um','cotxitm.cantidad as cant')
			->join('cotxitm', 'cotxitm.idCi', '=', 'detalleprocot.idItm')
			->join('item', 'item.idItm', '=', 'cotxitm.idItm')
			->leftjoin('unidadmedida', 'unidadmedida.idUm', '=', 'cotxitm.idUm')
			->where('detalleprocot.idCrp',$r->idCot)
            ->get();

		$cotizacion = TCotizacion::select('cotizacion.fechaCotizacion')
			->join('cotrecpro', 'cotrecpro.idCot', '=', 'cotizacion.idCot')
			->where('cotrecpro.idCrp',$r->idCot)
            ->first();
        // $items = json_decode($r->data,true);
        $this->razoSocial = strtoupper($p->tipoPersona="PERSONA NATURAL"?
            $p->nombre.' '.$p->apellidoPaterno.' '.$p->apellidoMaterno:
            $p->nombreRep.' '.$p->apellidoPaternoRep.' '.$p->apellidoMaternoRep);
        $this->numeroDocumento = $p->numeroDocumento;
        $this->direccion = $p->direccion;
        $this->celular = $p->celular;
        $this->correo = $p->correo;
        $tCot = TCotizacion::find($r->idCot);
        $diaA = date('d');
        $mesA = date('m');
        $anioA = date('Y');
        $this->fechaCotizacion = $cotizacion->fechaCotizacion;

        $garantia = $r->tGarantia;
        $validez = $r->tValidez;
        $entrega = $r->tEntrega;
        $marco = 0;
        $smarco = 1;
        $ssmarco = 1;
        $blanco = '';
        $fondo = true;
        $tam = 3.5;
        $sl = 2;

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
        // datos del proveedor
        $pdf->text(45,51,utf8_decode($this->razoSocial));
        $pdf->text(140,51,utf8_decode($this->numeroDocumento));
        $pdf->text(45,56.6,utf8_decode($this->direccion));
        $pdf->text(115,56.6,utf8_decode($this->celular));
        $pdf->text(154,56.6,utf8_decode($this->correo));
        // diseño la tabla de los items
        $pdf->Rect(10, 84, 10, 129.6, 'D');
        $pdf->Rect(20, 84, 15, 129.6, 'D');
        $pdf->Rect(35, 84, 15, 129.6, 'D');
        $pdf->Rect(50, 84, 75, 129.6, 'D');
        $pdf->Rect(125, 84, 15, 129.6, 'D');
        $pdf->Rect(140, 84, 20, 129.6, 'D');
        $pdf->Rect(160, 84, 20, 129.6, 'D');
        $pdf->Rect(180, 84, 20, 129.6, 'D');
        // cabezera de la tabla
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(10,$tam+6,utf8_decode('ITEM'),$ssmarco,0,'C');
        $pdf->Cell(15,$tam+6,utf8_decode('CANT'),$ssmarco,0,'C');
        $pdf->Cell(15,$tam+6,utf8_decode('UMD'),$ssmarco,0,'C');
        $pdf->Cell(75,$tam+6,utf8_decode('DESCRIPCION'),$ssmarco,0,'C');
        $pdf->Cell(15,$tam+6,utf8_decode('MARCA'),$ssmarco,0,'C');
        $pdf->Cell(20,$tam+6,utf8_decode('MODELO'),$ssmarco,0,'C');
        $pdf->Cell(20,$tam+6,utf8_decode('P.V'),$ssmarco,0,'C');
        $pdf->Cell(20,$tam+6,utf8_decode('SUBTOTAL'),$ssmarco,1,'C');
        $pdf->SetFont('Arial','',8);
        $parrafo = 'Este es un texto largo que ocupa varias líneas. ';
        $parrafo2 = 'Este es un texto largo que ocupa vars líneas rs líneas c';
        $alcance = 0;
        // realiza la creacion de cada item conjuntamnete con el tamaño de su contenedor
        // especificamente para el caso de nombre de cada item
        for ($i=0; $i < count($items); $i++) 
        { 
            $tam = 4;
            $tam2 = 4;
            if(strlen($items[$i]['nombre'])>53)
            {   $mul = intval(strlen($items[$i]['nombre']) / 53)+1;}
            else
            {   $mul = 1;}
            $alcance = $alcance + $mul;
            if($alcance>30)
            {
                $lispar2 = array_slice($items, $i);
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
        // pie de pagina en el caso que la cotizacion solo contenga una hoja
        $tam = 3.5;
        $pdf->ln(20);
        $pdf->SetFont('Arial','B',9);
        $pdf->Rect(160, 213.6, 20, 6.6, 'D');
        $pdf->Rect(180, 213.6, 20, 6.6, 'D');
        $pdf->text(166,218,utf8_decode('Total'));
        $pdf->text(184,218,'S/. '.number_format($this->totalCotizacion,2));
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
        // titulo
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,6,utf8_decode('SOLICITUD DE COTIZACION'),$marco,1,'C');
        $pdf->ln(9);
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

        // datos del proveedorel cual se repetira en cada hoja
        $pdf->SetFont('Arial','B',9);
        $pdf->text(45,51,utf8_decode($this->razoSocial));
        $pdf->text(140,51,utf8_decode($this->numeroDocumento));
        $pdf->text(45,56.6,utf8_decode($this->direccion));
        $pdf->text(115,56.6,utf8_decode($this->celular));
        $pdf->text(154,56.6,utf8_decode($this->correo));
        $pdf->SetFont('Arial','',9);

        $pdf->Cell(3,$tam+2,'',$marco,0,'L');
        $pdf->SetFont('Arial','B',9);
        
        $pdf->Cell(18,$tam+2,utf8_decode($this->fechaCotizacion),$marco,1,'L');
        $pdf->ln(3);
        // esquema de la tabla de los items
        $pdf->Rect(10, 84, 10, 129.6, 'D');
        $pdf->Rect(20, 84, 15, 129.6, 'D');
        $pdf->Rect(35, 84, 15, 129.6, 'D');
        $pdf->Rect(50, 84, 75, 129.6, 'D');
        $pdf->Rect(125, 84, 15, 129.6, 'D');
        $pdf->Rect(140, 84, 20, 129.6, 'D');
        $pdf->Rect(160, 84, 20, 129.6, 'D');
        $pdf->Rect(180, 84, 20, 129.6, 'D');
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
        // lista de los items el cual corre en la siguiente hoja solo cuenta
        // apartir de la segunda hoja
        $pdf->SetFont('Arial','',8);
        $alcance = 0;
        for ($i=0; $i < count($lispar); $i++) 
        { 
            $tam = 4;
            $tam2 = 4;
            if(strlen($lispar[$i]['nombre'])>53)
            {   $mul = intval(strlen($lispar[$i]['nombre']) / 53)+1;}
            else
            {   $mul = 1;}
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
        
        $pdf->Rect(160, 213.6, 20, 6.6, 'D');
        $pdf->Rect(180, 213.6, 20, 6.6, 'D');
        $pdf->text(166,218,utf8_decode('Total'));
        $pdf->text(184,218,'S/. '.number_format($this->totalCotizacion,2));

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
        
        $pdf->Output();
        exit;
    }
}
