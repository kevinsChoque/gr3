<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class FilesCotizacionController extends Controller
{
	public $lisparg = [
			'Este es un texto largo que ocupa vars líneas rs líneas c',
			'Este es un texto largo que ocupa vars líneas rs líneas cccccccc',
			'Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c',
			'Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c',
			'Este es un texto largo que ocupa vars líneas rs líneas c',
			'Este es un texto largo que ocupa vars líneas rs líneas cccccccc',
			'Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c',
			'Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c',
			'Este es un texto largo que ocupa vars líneas rs líneas c',
			'Este es un texto largo que ocupa vars líneas rs líneas cccccccc',
			'Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c',
			'Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c',
			'Este es un texto largo que ocupa vars líneas rs líneas c',
			'Este es un texto largo que ocupa vars líneas rs líneas cccccccc',
			'kevins Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c',
			'Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c',
			'Este es un texto largo que ocupa vars líneas rs líneas c',
			'Este es un texto largo que ocupa vars líneas rs líneas cccccccc',
			'kevins Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c',
			'Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c',
			'kevins Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c',
			'Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c'];
	public function cotizacion()
	{
		// dd('cascascacasc');
		$p = Session::get('proveedor');

		// $nombre = strtoupper($p->tipoPersona="PERSONA NATURAL"?
  //   	 	$p->nombre.' '.$p->apellidoPaterno.' '.$p->apellidoMaterno:
  //   	 	$p->nombreRep.' '.$p->apellidoPaternoRep.' '.$p->apellidoMaternoRep);
		$nombre = 'csacasc';
		$dni = '47655230';
		// $ruc = $p->numeroDocumento;

		$marco = 1;
    	$smarco = 1;
    	$ssmarco = 1;
    	$blanco = '';
    	$fondo = true;
    	$tam = 3.5;
    	$sl = 2;

    	$pdf = new Fpdf('P','mm','a4');
    	// $pdf->SetFont('Arial','',6);
		$pdf->AddPage();
		// --------------------cabecera
		// $pdf->Cell(0,$tam+35,utf8_decode('-'),$marco,1,'C');
		$pdf->Image('img/panelAdm/logoFile.png',10,10,18);
		$pdf->SetFont('Arial','B',9);
		$pdf->text(33,13.5,utf8_decode('GOBIERNO REGIONAL DE APURIMAC'));
		$pdf->Cell(190,5,utf8_decode('-'),$marco,1,'L');
		$pdf->SetFont('Arial','',6);
		$pdf->text(38,17,utf8_decode('OFICINA DE ABASTECIMIENTO Y SERVICIOS'));
		$pdf->text(54,20.5,utf8_decode('AUXILIARES'));
		$pdf->Cell(190,3,utf8_decode('---'),$marco,1,'C');
		$pdf->Cell(190,3,utf8_decode('---'),$marco,1,'C');

		$pdf->SetFont('Arial','',11);
		$pdf->Rect(180, 10, 20, 9, 'D');
		$pdf->Rect(160, 10, 20, 9, 'D');
		$pdf->text(183.5,14,utf8_decode('FECHA'));
		$pdf->text(166,14,utf8_decode('AÑO'));
		$pdf->SetFont('Arial','',10);
		$pdf->text(181,18,utf8_decode('03/03/6666'));
		$pdf->text(166,18,utf8_decode('6666'));
		$pdf->ln(12);
		// estas lineas borrar
		// $pdf->Cell(190,5,utf8_decode('_______________________________________________________________________________________________________________________________'),$marco,1,'C');
		// $pdf->Line(10, 20, 100, 20);
// ------titulo
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(190,6,utf8_decode('SOLICITUD DE COTIZACION Nª 609'),$marco,1,'C');
		$pdf->ln(9);
// ------primera seccion
	$pdf->SetFont('Arial','',9);
		$pdf->Rect(10, 47, 190, 23, 'D');
		$pdf->Cell(3,$tam,utf8_decode('-'),$marco,0,'L');
		$pdf->Cell(30,$tam,utf8_decode('RAZON SOCIAL:'),$marco,0,'L');
		$pdf->Cell(70,$tam,utf8_decode('________________________________________'),$marco,0,'L');
		$pdf->Cell(25,$tam,utf8_decode('RUC:'),$marco,0,'L');
		$pdf->Cell(59,$tam,utf8_decode('________________________________'),$marco,0,'L');
		$pdf->Cell(3,$tam,utf8_decode('-'),$marco,1,'L');

		$pdf->Cell(3,$tam,utf8_decode('-'),$marco,0,'L');
		$pdf->Cell(30,$tam,utf8_decode('DIRECCION:'),$marco,0,'L');
		$pdf->Cell(48,$tam,utf8_decode('____________________________'),$marco,0,'L');
		$pdf->Cell(22,$tam,utf8_decode('TELEFONO:'),$marco,0,'L');
		$pdf->Cell(25,$tam,utf8_decode('_______________'),$marco,0,'L');
		$pdf->Cell(14,$tam,utf8_decode('EMAIL:'),$marco,0,'L');
		$pdf->Cell(45,$tam,utf8_decode('________________________'),$marco,0,'L');
		$pdf->Cell(3,$tam,utf8_decode('-'),$marco,1,'L');

		$pdf->Cell(3,$tam,utf8_decode('-'),$marco,0,'L');
		$pdf->Cell(30,$tam,utf8_decode('REFERENCIA:'),$marco,0,'L');
		$pdf->Cell(154,$tam,utf8_decode('______________________________________________________________________________________'),$marco,0,'L');
		$pdf->Cell(3,$tam,utf8_decode('-'),$marco,1,'L');

		$pdf->Cell(3,$tam,utf8_decode('-'),$marco,0,'L');
		$pdf->Cell(30,$tam,utf8_decode('Nª META:'),$marco,0,'L');
		$pdf->Cell(154,$tam,utf8_decode('______________________________________________________________________________________'),$marco,0,'L');
		$pdf->Cell(3,$tam,utf8_decode('-'),$marco,1,'L');

		$pdf->Cell(3,$tam,utf8_decode('-'),$marco,0,'L');
		$pdf->MultiCell(184, $tam, utf8_decode('Por medio de la presente sirvase cotizar los siguientes items correspondientes al cuadro de contrataciones Nro. 844 de fecha'), $marco, 'J');

		$pdf->Cell(3,$tam,utf8_decode('-'),$marco,0,'L');
		$pdf->SetFont('Arial','B',9);
		$pdf->Cell(18,$tam,utf8_decode('03/03/6666'),$marco,1,'L');
		$pdf->ln(6);


// items
		$pdf->Rect(10, 75, 10, 150, 'D');
		$pdf->Rect(20, 75, 15, 150, 'D');
		$pdf->Rect(35, 75, 15, 150, 'D');
		$pdf->Rect(50, 75, 75, 150, 'D');
		$pdf->Rect(125, 75, 15, 150, 'D');
		$pdf->Rect(140, 75, 20, 150, 'D');
		$pdf->Rect(160, 75, 20, 150, 'D');
		$pdf->Rect(180, 75, 20, 150, 'D');

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
		$lispar = [
			'1.-Este es un texto largo que ocupa vars líneas rs líneas c',
			'2.-Este es un texto largo que ocupa vars líneas rs líneas cccccccc',
			'3.-Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c',
			'4.-Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c',
			'5.-Este es un texto largo que ocupa vars líneas rs líneas c',
			'6.-Este es un texto largo que ocupa vars líneas rs líneas cccccccc',
			'7.-Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c',
			'8.-Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c',
			'9.- es un texto largo que ocupa vars líneas rs líneas c',
			'10.-Este es un texto largo que ocupa vars líneas rs líneas cccccccc',
			'11.-Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c',
			'12.-Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c',
			'13.-Este es un texto largo que ocupa vars líneas rs líneas c',
			'14.-Este es un texto largo que ocupa vars líneas rs líneas cccccccc',
			'15.-kevins Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c',
			'16.-Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c',
			'17.-Este es un texto largo que ocupa vars líneas rs líneas c',
			'18.-Este es un texto largo que ocupa vars líneas rs líneas cccccccc',
			'19.-kevins Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c',
			'20.-Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c'];
		$alcance = 0;
		$pdf->text(95,45,count($lispar));
		for ($i=0; $i < count($lispar); $i++) 
		{ 
			$tam = 4;
			$tam2 = 4;
			if(strlen($lispar[$i])>60)
			{
				$mul = intval(strlen($lispar[$i]) / 60)+1;
			}
			else
			{
				$mul = 1;
			}
			$alcance = $alcance + $mul;
			if($alcance>35)
			{
				$lispar2 = array_slice($lispar, $i);
				$pdf->text(150,42,'nuevo array tiene->'.count($lispar2));

				$pdf->text(120,42,'$mul->'.$mul);
				$pdf->text(120,44,'alcance->'.$alcance);
				$pdf->text(120,46,'cant lista->'.count($lispar));
				$pdf->AddPage();
				break;
			}
			$tam = $tam*$mul;

			$xPosition = $pdf->GetX();
			$yPosition = $pdf->GetY();

			$pdf->Cell(10,$tam,utf8_decode($i),$ssmarco,0,'C');
			$pdf->Cell(15,$tam,utf8_decode('1.00'),$ssmarco,0,'C');
			$pdf->Cell(15,$tam,utf8_decode('servicio'),$ssmarco,0,'C');
			// $pdf->Cell(75,$tam,utf8_decode('adquisicion de productos'),$ssmarco,0,'L');
			// $pdf->MultiCell(75, $tam, utf8_decode($parrafo2.strlen($parrafo2)),$ssmarco);
			$pdf->MultiCell(75, $tam2, utf8_decode($lispar[$i].strlen($lispar[$i])),$ssmarco);
			$pdf->SetY($yPosition);
			$pdf->SetX($xPosition+115);
			$pdf->Cell(15,$tam,utf8_decode('marca'),$ssmarco,0,'C');
			$pdf->Cell(20,$tam,utf8_decode('modelo'),$ssmarco,0,'C');
			$pdf->Cell(20,$tam,utf8_decode('100.00'),$ssmarco,0,'C');
			$pdf->Cell(20,$tam,utf8_decode('100.00'),$ssmarco,1,'C');

			// unset($lispar[$i]);
		}
		$pdf->text(95,250,$alcance.'---');
		// $tam = 3.5;
		// $pdf->ln(105.6);
		// $pdf->SetFont('Arial','',9);
		// $pdf->Cell(150,$tam+3,utf8_decode('-'),0,0,'C');
		// $pdf->Cell(20,$tam+3,utf8_decode('Total'),$ssmarco,0,'C');
		// $pdf->Cell(20,$tam+3,utf8_decode('S/. 256'),$ssmarco,1,'C');


// con esto sabemos el tamaño q nos sobra del papel
		// $pdf->ln(12);
		// $posicionY = $pdf->GetY();
		// $espacioVerticalRestante = $pdf->GetPageHeight() - $posicionY;
		// $pdf->Cell(150,$tam,utf8_decode('espacioVerticalRestante---'.$espacioVerticalRestante),$marco,1,'C');
		// $pdf->Cell(150,$tam,utf8_decode('pdf->GetPageHeight()---'.$pdf->GetPageHeight()),$marco,1,'C');
		// $pdf->Cell(150,$tam,utf8_decode('posicionY--'.$posicionY),$marco,1,'C');
// ------------------------------------------------------------------------------
// ------------------------------------------------------------------------------
// ------------------------------------------------------------------------------
		// $tam = 3.5;
		// $pdf->Cell(3,$tam,utf8_decode('-'),$marco,0,'C');
		// $pdf->Cell(64,$tam,utf8_decode('Sirvase completar los siguientes campos:'),$marco,0,'L');
		// $pdf->Cell(120,$tam,utf8_decode('-'),$marco,0,'C');
		// $pdf->Cell(3,$tam,utf8_decode('-'),$marco,1,'C');
		
// ESTE EJEMPLO ES MUY IMPORTANTE
// ----------------------------------------------------------------
// ----------------------------------------------------------------
// ----------------------------------------------------------------
// $pdf->ln(6);
// // MultiCell
// $pdf->SetFont('Arial', '', 12);
// $pdf->MultiCell(80, 5, 'Este es un texto largo que ocupa varias líneas.',$marco);
// // Ajustar posición vertical para la próxima celda en la misma fila
// $yPosition = $pdf->GetY();
// $xPosition = $pdf->GetX();
// $pdf->SetY($yPosition-10);
// $pdf->SetX($xPosition+80);
// // Añadir celda en la misma fila
// $pdf->Cell(50, 5, 'Celda en la misma fila',$marco);
// $pdf->Cell(50, 5, 'Celda en la misma fila',$marco);
// $pdf->ln(24);
// // -------------------------------------------------
// $pdf->SetFont('Arial','',8);
// $parrafo = 'Este es un texto largo que ocupa varias líneas. ';
// $parrafo2 = 'Este es un texto largo que ocupa vars líneas rs líneas c';
// $lispar = ['Este es un texto largo que ocupa vars líneas rs líneas c', 'Este es un texto largo que ocupa vars líneas rs líneas cccccccc','Este es un texto largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas c','Este es un texto largo que ocupa vars líneas rs líneas c to largo independiente ocupa vars líneas rs líneas c to largo que ocupa vars líneas rs líneas cars líneas líneas independiente largo que ocupa vars líneas rs líneas c'];
// for ($i=0; $i < 4; $i++) 
// { 
// 	$tam = 3.5;
// 	$tam2 = 3.5;
// 	if(strlen($lispar[$i])>60)
// 	{
// 		$mul = intval(strlen($lispar[$i]) / 60)+1;
// 	}
// 	else
// 	{
// 		$mul = 1;
// 	}
// 	$tam = $tam*$mul;

	
// 	$xPosition = $pdf->GetX();
// 	$yPosition = $pdf->GetY();

// 	$pdf->Cell(10,$tam,utf8_decode($i),$marco,0,'C');
// 	$pdf->Cell(15,$tam,utf8_decode('1.00'),$marco,0,'C');
// 	$pdf->Cell(15,$tam,utf8_decode('servicio'),$marco,0,'C');
// 	// $pdf->Cell(75,$tam,utf8_decode('adquisicion de productos'),$marco,0,'L');
// 	// $pdf->MultiCell(75, $tam, utf8_decode($parrafo2.strlen($parrafo2)),$marco);
// 	$pdf->MultiCell(75, $tam2, utf8_decode($lispar[$i].strlen($lispar[$i])),$marco);
// 	$pdf->SetY($yPosition);
// 	$pdf->SetX($xPosition+115);
// 	$pdf->Cell(15,$tam,utf8_decode('marca'),$marco,0,'C');
// 	$pdf->Cell(20,$tam,utf8_decode('modelo'),$marco,0,'C');
// 	$pdf->Cell(20,$tam,utf8_decode('100.00'),$marco,0,'C');
// 	$pdf->Cell(20,$tam,utf8_decode('100.00'),$marco,1,'C');
// }
// ----------------------------------------------------------------
// ----------------------------------------------------------------
// ----------------------------------------------------------------


		$pdf->Output();

        exit;
	}
	public function cci()
	{
		// dd('ok llego aki');
		$p = Session::get('proveedor');

		$nombre = strtoupper($p->tipoPersona="PERSONA NATURAL"?
    	 	$p->nombre.' '.$p->apellidoPaterno.' '.$p->apellidoMaterno:
    	 	$p->nombreRep.' '.$p->apellidoPaternoRep.' '.$p->apellidoMaternoRep);
		$dni = '47655230';
		$ruc = $p->numeroDocumento;
		$celular = $p->celular;
		$cci = $p->cci;
		$banco = $p->banco;

		$marco = 0;
    	$smarco = 1;
    	$blanco = '';
    	$fondo = true;
    	$tam = 3.5;
    	$sl = 2;

    	$pdf = new Fpdf('P','mm','a4');
    	// $pdf->SetFont('Arial','',6);
		$pdf->AddPage();
		// --------------------cabecera
		// $pdf->Cell(0,$tam+35,utf8_decode('-'),$marco,1,'C');
		$pdf->Image('img/panelAdm/logoFile.png',10,10,15);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(190,5,utf8_decode('GOBIERNO REGIONAL DE APURIMAC'),$marco,1,'C');
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(190,3,utf8_decode('SubGerencia de Abastecimientos y Servicios'),$marco,1,'C');
		$pdf->Cell(190,3,utf8_decode('Auxiliares'),$marco,1,'C');
		$pdf->ln(5);
		// estas lineas borrar
		// $pdf->Cell(190,5,utf8_decode('_______________________________________________________________________________________________________________________________'),$marco,1,'C');
		// $pdf->Line(10, 20, 100, 20);
// ------
		$pdf->SetLineWidth(1); 
		$pdf->SetDrawColor(200, 200, 200); 
		$pdf->SetFillColor(150, 150, 150); 

		$pdf->Line(10, 30, 200, 30);
		// reestablecer valores d linea
		$pdf->SetLineWidth(0); 
		$pdf->SetDrawColor(0, 0, 0); 
		$pdf->SetFillColor(255, 255, 255); 
		// $pdf->Line(10, 40, 200, 40);
// ------
		// titulo
		$pdf->ln(12);
		$pdf->SetFont('Arial','B',13);
		$pdf->Cell(190,6,utf8_decode('DECLARACION JURADA DE CODIGO DE CUENTA INTERBANCARIA Y CUENTA DE'),$marco,1,'C');
		$pdf->Cell(190,6,utf8_decode('DETRACCIONES'),$marco,1,'C');
		$pdf->ln(6);
		// datos
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(190,$tam+2.5,utf8_decode('SEÑORES:'),$marco,1,'L');
		$pdf->Cell(190,$tam+2.5,utf8_decode('SUBGERENCIA DE ABASTECIMIENTOS Y SERVICIOS AUXILIARES'),$marco,1,'L');
		$pdf->Cell(190,$tam+2.5,utf8_decode('GOBIERNO REGIONAL DE APURIMAC'),$marco,1,'L');
		$pdf->ln(3);
		// DESARROLLO
		$pdf->SetFont('Arial','B',9);
		$pdf->Cell(190,$tam+2.5,utf8_decode('PRESENTE.-'),$marco,1,'L');
		$pdf->ln(6);

		$pdf->SetFont('Arial','',9);
		
		$pdf->MultiCell(190, $tam + 2, utf8_decode('El que suscribe, '.$nombre.', identificado(a) con DNI Nro '.$dni.' y RUC Nro '.$ruc.', con número de teléfono / celular '.$celular.', DECLARO que mi numero de CODIGO DE CUENTA INTERBANCARIA (CCI) es:'), $marco, 'J');
$pdf->SetFont('Arial','B',12);
$pdf->ln($sl+3);
		$lnc = str_split($cci);
		$pdf->Cell(5, 6, '-', $smarco, 0, 'C');
		$pdf->Cell(9, 6, $lnc[0], $smarco, 0, 'C');
		$pdf->Cell(9, 6, $lnc[1], $smarco, 0, 'C');
		$pdf->Cell(9, 6, $lnc[2], $smarco, 0, 'C');
		$pdf->Cell(9, 6, $lnc[3], $smarco, 0, 'C');
		$pdf->Cell(9, 6, $lnc[4], $smarco, 0, 'C');
		$pdf->Cell(9, 6, $lnc[5], $smarco, 0, 'C');
		$pdf->Cell(9, 6, $lnc[6], $smarco, 0, 'C');
		$pdf->Cell(9, 6, $lnc[7], $smarco, 0, 'C');
		$pdf->Cell(9, 6, $lnc[8], $smarco, 0, 'C');
		$pdf->Cell(9, 6, $lnc[9], $smarco, 0, 'C');
		$pdf->Cell(9, 6, $lnc[10], $smarco, 0, 'C');
		$pdf->Cell(9, 6, $lnc[11], $smarco, 0, 'C');
		$pdf->Cell(9, 6, $lnc[12], $smarco, 0, 'C');
		$pdf->Cell(9, 6, $lnc[13], $smarco, 0, 'C');
		$pdf->Cell(9, 6, $lnc[14], $smarco, 0, 'C');
		$pdf->Cell(9, 6, $lnc[15], $smarco, 0, 'C');
		$pdf->Cell(9, 6, $lnc[16], $smarco, 0, 'C');
		$pdf->Cell(9, 6, $lnc[17], $smarco, 0, 'C');
		$pdf->Cell(9, 6, $lnc[18], $smarco, 0, 'C');
		$pdf->Cell(9, 6, $lnc[19], $smarco, 0, 'C');
		$pdf->Cell(5, 6, '-', $smarco, 0, 'C');
$pdf->ln($sl+9);
$pdf->SetFont('Arial','',9);

		$pdf->Cell(190,$tam+2.5,utf8_decode('ENTIDAD BANCARIA : '.strtoupper($banco)),$marco,1,'C');


// ------
		$pdf->SetLineWidth(1); 
		$pdf->SetDrawColor(200, 200, 200); 
		$pdf->SetFillColor(150, 150, 150); 

		$pdf->Line(10, 125, 200, 125);
		// reestablecer valores d linea
		$pdf->SetLineWidth(0); 
		$pdf->SetDrawColor(0, 0, 0); 
		$pdf->SetFillColor(255, 255, 255); 
		$pdf->ln($sl+6);
// ------
		$pdf->SetFont('Arial','',8.5);
		$pdf->Cell(190,$tam+2.5,utf8_decode('IMPORTANTE: LA CUENTA CCI CONSTA DE VEINTE DIGITOS Y DEBE SER TRAMITADA EN EL BANCO CON EL NUMERO DE RUC.'),$marco,1,'L');
		$pdf->SetFont('Arial','',9);
		// $pdf->Cell(190,$tam+2.5,utf8_decode('Asimismo, DECLARO que mi numero de CUENTA DE DETRACCIONES es 939338383 en el BANCO BANCO DE LA NACION'),$marco,1,'L');

		$pdf->MultiCell(190, $tam + 1, utf8_decode('Cuento con las condiciones necesarias para cumplir cabalmente con las caracteristicas tecnicas, requisitos y condiciones establecidas en las especificaciones Tecnicas y/o Terminos de Referencia de la contratacion.'), $marco, 'J');



		// firma
		$pdf->text(75,200,utf8_decode('......................................................................'));
		$pdf->text(100,205,utf8_decode('Firma'));


		$pdf->Output();
		

        exit;

	}
    public function declaracionJurada()
    {
    	// echo('llego');exit();
    	$p = Session::get('proveedor');
    	 // dd($p);
    	$nombre = strtoupper($p->tipoPersona="PERSONA NATURAL"?
    	 	$p->nombre.' '.$p->apellidoPaterno.' '.$p->apellidoMaterno:
    	 	$p->nombreRep.' '.$p->apellidoPaternoRep.' '.$p->apellidoMaternoRep);
    	$dni = $p->tipoPersona="PERSONA NATURAL"?
    	 	substr($p->numeroDocumento, 2, 8):
    	 	$p->dniRep;
    	$ruc  = $p->numeroDocumento;
    	$celular  = $p->celular;
    	$domicilio  = $p->tipoPersona="PERSONA NATURAL"?
    		$p->direccion:
    		$p->direccionRep;
    	// $nombre = mb_convert_case($nombre, MB_CASE_LOWER, "UTF-8");
                // $r->merge(['idUsu' => $tUsu->idUsu]);
    	// -------------------
    	$marco = 0;
    	$smarco = 0;
    	$blanco = '';
    	$fondo = true;
    	$tam = 3.5;
    	$sl = 2;

    	$pdf = new Fpdf('P','mm','a4');
    	// $pdf->SetFont('Arial','',6);
		$pdf->AddPage();
		// --------------------cabecera
		// $pdf->Cell(0,$tam+35,utf8_decode('-'),$marco,1,'C');
		$pdf->Image('img/panelAdm/logoFile.png',10,10,15);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(190,5,utf8_decode('GOBIERNO REGIONAL DE APURIMAC'),$marco,1,'C');
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(190,3,utf8_decode('SubGerencia de Abastecimientos y Servicios'),$marco,1,'C');
		$pdf->Cell(190,3,utf8_decode('Auxiliares'),$marco,1,'C');
		$pdf->ln(5);
		// estas lineas borrar
		// $pdf->Cell(190,5,utf8_decode('_______________________________________________________________________________________________________________________________'),$marco,1,'C');
		// $pdf->Line(10, 20, 100, 20);
// ------
		$pdf->SetLineWidth(1); 
		$pdf->SetDrawColor(200, 200, 200); 
		$pdf->SetFillColor(150, 150, 150); 

		$pdf->Line(10, 30, 200, 30);
		// reestablecer valores d linea
		$pdf->SetLineWidth(0); 
		$pdf->SetDrawColor(0, 0, 0); 
		$pdf->SetFillColor(255, 255, 255); 
		// $pdf->Line(10, 40, 200, 40);
// ------
		// titulo
		$pdf->ln(12);
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(190,6,utf8_decode('DECLARACION JURADA DEL PROVEEDOR'),$marco,1,'C');
		$pdf->ln(6);
		// datos
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(190,$tam+2.5,utf8_decode('Señores:'),$marco,1,'L');
		$pdf->Cell(190,$tam+2.5,utf8_decode('SUBGERENCIA DE ABASTECIMIENTOS Y SERVICIOS AUXILIARES'),$marco,1,'L');
		$pdf->Cell(190,$tam+2.5,utf8_decode('GOBIERNO REGIONAL DE APURIMAC'),$marco,1,'L');
		$pdf->ln(3);
		// DESARROLLO
		$pdf->SetFont('Arial','B',9);
		$pdf->Cell(190,$tam+2.5,utf8_decode('Presente.-'),$marco,1,'L');
		$pdf->ln(6);

		$pdf->SetFont('Arial','',9);
		
		$pdf->MultiCell(190, $tam + 2.5, utf8_decode('Por medio de la presente, yo '.$nombre.', identificado(a) con DNI Nro '.$dni.' y RUC '.$ruc.', con número de teléfono / celular '.$celular.', DECLARO BAJO JURAMENTO lo siguiente:'), $marco, 'J');
		// ---------------------------------------------------------------------------------------------------------------------
		// Establecer la fuente normal
// $pdf->SetFont('Arial', '', 12);

// // Imprimir la primera parte del texto
// $pdf->MultiCell(190, $tam + 2.5, utf8_decode('Por medio de la presente, yo '), $marco, 'J');

// // Cambiar a la fuente en negrita
// $pdf->SetFont('Arial', 'B', 12);

// // Imprimir la variable $nombre en negrita
// $pdf->MultiCell(190, $tam + 2.5, utf8_decode($nombre), $marco, 'J');

// // Cambiar de nuevo a la fuente normal
// $pdf->SetFont('Arial', '', 12);

// // Imprimir el resto del texto
// $pdf->MultiCell(190, $tam + 2.5, utf8_decode(', identificado(a) con DNI Nro __________ y RUC __________, con número de teléfono / celular teléfono ________, DECLARO BAJO JURAMENTO lo siguiente:'), $marco, 'J');
		// ---------------------------------------------------------------------------------------------------------------------
// // Establecer la fuente normal
// $pdf->SetFont('Arial', '', 9);

// // Imprimir la primera parte del texto
// $pdf->Write(5, utf8_decode('Por medio de la presente, yo cascsacsac csacascascasc scas '));

// // Cambiar a la fuente en negrita
// $pdf->SetFont('Arial', 'B', 9);

// // Imprimir la variable $nombre en negrita
// $pdf->Write(5, utf8_decode($nombre));

// // Cambiar de nuevo a la fuente normal
// $pdf->SetFont('Arial', '', 9);

// // Imprimir el resto del texto
// $pdf->Write(5, utf8_decode(', identificado(a) con DNI Nro __________ y RUC __________, con número de teléfono / celular teléfono ________, DECLARO BAJO JURAMENTO lo siguiente:'));
// $pdf->ln(6);

		// ---------------------------------------------------------------------------------------------------------------------
		$pdf->ln($sl);
		$pdf->Cell(190,$tam+2.5,utf8_decode('1.- No haber incurrido y me obligo a no incurrir en actos de corrupcion , asi como a respetar el principio de integridad.'),$marco,1,'L');
		$pdf->ln($sl);
		$pdf->Cell(190,$tam+2.5,utf8_decode('2.- No tener impedimento para contratar con el Estado, conforme al articulo 11 de la Ley de Contrataciones del Estado.'),$marco,1,'L');
		$pdf->ln($sl);
		$pdf->MultiCell(190, $tam + 1, utf8_decode('3.- Cuento con las condiciones necesarias para cumplir cabalmente con las caracteristicas tecnicas, requisitos y condiciones establecidas en las Especificaciones Tecnicas y/o Terminos de Referencia de la contratacion.'), $marco, 'J');
		$pdf->ln($sl);
		$pdf->Cell(190,$tam+2.5,utf8_decode('4.- Me someto a las sanciones contenidas en la Ley del Procedimiento Administrativo General, Ley Nro 27444.'),$marco,1,'L');
		$pdf->ln($sl);
		$pdf->MultiCell(190, $tam + 1, utf8_decode('5.- Participar en el presente proceso de contratacion en forma independiente sin medir consulta, comunicacion, acuerdo, arreglo o convenio con ningun proveedor y conocer las disposiciones del Decreto Legislativo Nro 11034, Decreto Legislativo que aprueba la Ley de Represion de Conductas Anticompetitivas.'), $marco, 'J');
		$pdf->ln($sl);
		$pdf->Cell(190,$tam+2.5,utf8_decode('6.- De ser seleccionado para la contratacion, me comprometo a mantener mi oferta hasta el pago.'),$marco,1,'L');
		$pdf->ln($sl);
		$pdf->MultiCell(190, $tam + 1, utf8_decode('7.- En caso de incumplimiento injustificado, acepto la aplicacion de la penalidad por mora establecida en la Directiva Nro: 003-2021GR APURIMAC/GGR "Normas para la contratacion de bienes y servicios, para montos iguales o inferiores a ocho (8) Unidades Impositivas Tributarias del Gobierno Regional de Apurimac - Sede Central".'), $marco, 'J');
		$pdf->ln($sl);
		$pdf->MultiCell(190, $tam + 1, utf8_decode('8.- De ser seleccionado para efectura la presente contratacion, autorizo se me notifique al correo electronico email y/o a mi domicilio sito en '.$domicilio.'.'), $marco, 'J');
		$pdf->ln($sl);
		$pdf->MultiCell(190, $tam + 1, utf8_decode('9.- No ser Propietario, Socio, Representante Legal, Gerente General o cualquier vinculo de otra empresa que cotiza por el mismo objeto de las Especificaciones Tecnicas o Terminos de Referencia a los que me presento.'), $marco, 'J');
		$pdf->ln($sl);
		$pdf->MultiCell(190, $tam + 1, utf8_decode('10.- Ser responsable de la veracidad de los documentos e informacion que presento en el presente procedimiento de seleccion.'), $marco, 'J');


		// firma
		$pdf->text(75,250,utf8_decode('......................................................................'));
		$pdf->text(100,255,utf8_decode('Firma'));


	// 	$pdf->SetFont('Arial','',8);
	// 	$pdf->text(20,35,utf8_decode('AV. INCA GARCILAZO DE LA VEGA NRO 123 CUSCO - CUSCO'));
	// 	$pdf->text(20,38,utf8_decode('TELEFONO: 986568568 - 985456365'));
	// 	$pdf->text(20,41,utf8_decode('WEB: www.grupotelecomunicaciones.com'));
	// 	$pdf->text(20,44,utf8_decode('CORREO: ventas@grupotelecomunicaciones.com'));

	// $pdf->rect(140,23,58,21);
	// 	$pdf->SetFont('Arial','',12);
	// 	$pdf->text(150,30,utf8_decode('RUC: 20123123123'));
	// 	$pdf->text(145,35,utf8_decode('BOLETA ELECTRONICA'));
	// 	$pdf->text(155,40,utf8_decode('Nª B001 - '));
		// --------------------------------datos de cliente
	
		$pdf->Output();

        exit;
    }
    public function anexo5()
    {
		$p = Session::get('proveedor');
		$nombre = strtoupper($p->tipoPersona="PERSONA NATURAL"?
    	 	$p->nombre.' '.$p->apellidoPaterno.' '.$p->apellidoMaterno:
    	 	$p->nombreRep.' '.$p->apellidoPaternoRep.' '.$p->apellidoMaternoRep);
    	$dni = $p->tipoPersona="PERSONA NATURAL"?
    	 	substr($p->numeroDocumento, 2, 8):
    	 	$p->dniRep;
    	$razonSocial = strtoupper($p->tipoPersona="PERSONA NATURAL"?'':$p->razonSocial);
		$domicilio = strtoupper($p->tipoPersona="PERSONA NATURAL"?'':$p->direccionRep);

		$marco = 0;
    	$smarco = 1;
    	$ssmarco = 1;
    	$blanco = '';
    	$fondo = true;
    	$tam = 3.5;
    	$sl = 2;

    	$pdf = new Fpdf('P','mm','a4');
    	// $pdf->SetFont('Arial','',6);
		$pdf->AddPage();
		// --------------------cabecera
		// $pdf->Cell(0,$tam+35,utf8_decode('-'),$marco,1,'C');
		$pdf->Image('img/panelAdm/logoFile.png',10,10,15);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(190,5,utf8_decode('GOBIERNO REGIONAL DE APURIMAC'),$marco,1,'C');
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(190,3,utf8_decode('SubGerencia de Abastecimientos y Servicios'),$marco,1,'C');
		$pdf->Cell(190,3,utf8_decode('Auxiliares'),$marco,1,'C');
		$pdf->ln(5);
		// estas lineas borrar
// ------
		$pdf->SetLineWidth(1); 
		$pdf->SetDrawColor(200, 200, 200); 
		$pdf->SetFillColor(150, 150, 150); 
		$pdf->Line(10, 30, 200, 30);
		// reestablecer valores d linea
		$pdf->SetLineWidth(0); 
		$pdf->SetDrawColor(0, 0, 0); 
		$pdf->SetFillColor(255, 255, 255); 
// ------
		// titulo
		$pdf->ln(12);
		$pdf->SetFont('Arial','B',13);
		$pdf->Cell(190,6,utf8_decode('ANEXO 05'),$marco,1,'C');
		$pdf->Cell(190,6,utf8_decode('DECLARACION JURADA'),$marco,1,'C');
		$pdf->ln(6);
		// datos
		$pdf->SetFont('Arial','B',9);
		$pdf->Cell(190,$tam+2.5,utf8_decode('SEÑORES:'),$marco,1,'L');
		$pdf->Cell(190,$tam+2.5,utf8_decode('OFICINA DE ABASTECIMIENTO, PATRIMONIO Y MARGESI DE BIENES GOBIERNO REGIONAL DE APURIMAC'),$marco,1,'C');
// datos-----------------------------------------------------------------------
		$pdf->text(20,74,utf8_decode($nombre));
		$pdf->text(165,74,utf8_decode($dni));
		$pdf->text(50,80,utf8_decode($razonSocial));
		$pdf->text(100,98,utf8_decode($domicilio));

// datos-----------------------------------------------------------------------
		$pdf->ln(3);
		$pdf->SetFont('Arial','',9);
		$pdf->Cell(190,$tam+2.5,utf8_decode('Yo........................................................................................................................................Con DNI Nª.......................................................'),$marco,1,'L');
		$pdf->Cell(190,$tam+2.5,utf8_decode('Representante legal de ................................................................................................................................................................................'),$marco,1,'L');
		$pdf->ln(3);
		$pdf->Cell(190,$tam+2.5,utf8_decode('(Solo en caso de ser persona juridica)'),$marco,1,'C');
		$pdf->ln(3);
		$pdf->Cell(190,$tam+2.5,utf8_decode('Con RUC Nª ........................................................Direccion...........................................................................................................................'),$marco,1,'C');
		$pdf->Cell(190,$tam+2.5,utf8_decode('Telefono Nª .........................................................Correo Electronico.............................................................................................................'),$marco,1,'C');
		$pdf->ln(6);
// ------
		$pdf->SetLineWidth(1); 
		$pdf->SetDrawColor(200, 200, 200); 
		$pdf->SetFillColor(150, 150, 150); 

		$pdf->Line(10, 110, 200, 110);
		// reestablecer valores d linea
		$pdf->SetLineWidth(0); 
		$pdf->SetDrawColor(0, 0, 0); 
		$pdf->SetFillColor(255, 255, 255); 
		// $pdf->ln($sl+6);
// ------

		$pdf->SetFont('Arial','B',9);
		$pdf->Cell(190,$tam+2.5,utf8_decode('Declaro bajo juramento'),$marco,1,'L');
		$pdf->SetFont('Arial','',9);
		$pdf->ln(6);
// items
		$pdf->Cell(10,$tam+2.5,'',$marco,0,'L');
		$pdf->Cell(10,$tam+2.5,'1.',$marco,0,'C');
		$pdf->MultiCell(160, $tam+1.5, utf8_decode('No estar impedido para contratar con el estado de acuerdo al articulo II de la ley Nª 30225 Ley de Contrataciones con el Estado.'), $marco, 'J');

		$pdf->Cell(10,$tam+2.5,'',$marco,0,'L');
		$pdf->Cell(10,$tam+2.5,'2.',$marco,0,'C');
		$pdf->MultiCell(160, $tam+1.5, utf8_decode('Conocer, aceptar y someterme a las Especificaiones Tecnicas y/o Terminos de Referencia de la presente contratacion de bienes o servicios.'), $marco, 'J');

		$pdf->Cell(10,$tam+2.5,'',$marco,0,'L');
		$pdf->Cell(10,$tam+2.5,'3.',$marco,0,'C');
		$pdf->MultiCell(160, $tam+2.5, utf8_decode('De la veracidad de los datos y/o documentos que presento a efectos del presente proceso de contratacion.'), $marco, 'J');

		$pdf->Cell(10,$tam+2.5,'',$marco,0,'L');
		$pdf->Cell(10,$tam+2.5,'4.',$marco,0,'C');
		$pdf->MultiCell(160, $tam+1.5, utf8_decode('Conocer las sanciones contenidas en la ley de Contrataciones del Estado y su Reglamento, asi como en la ley Nª 27444 ley de Procedimiento Administrativo General y las sanciones previstas en la directiva.'), $marco, 'J');

		$pdf->Cell(10,$tam+2.5,'',$marco,0,'L');
		$pdf->Cell(10,$tam+2.5,'5.',$marco,0,'C');
		$pdf->MultiCell(160, $tam+2.5, utf8_decode('Aceptar a travez del siguiente correo electronico para efectos de notificacion durante la ejecucion contractual.'), $marco, 'J');
		$pdf->ln(18);

		$pdf->Cell(10,$tam+2.5,'',$marco,0,'L');
		$pdf->Cell(170,$tam+2.5,'Abancay..................De................del 2023',$marco,0,'R');
		$pdf->Cell(10,$tam+2.5,'',$marco,0,'L');


$pdf->ln(48);
		// firma
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(190,$tam,utf8_decode('.....................................................'),$marco,1,'C');
		$pdf->Cell(190,$tam,utf8_decode('Firma, Nombres y Apellidos del postor o'),$marco,1,'C');
		$pdf->Cell(190,$tam,utf8_decode('Representante legal, segun corresponda'),$marco,1,'C');


		$pdf->Output();

        exit;
    }
}