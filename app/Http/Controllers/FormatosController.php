<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

class FormatosController extends Controller
{
    public function formatosFile($nombreArchivo)
    {
        $rutaArchivo = storage_path('app/public/formatos/'.$nombreArchivo);
        if (file_exists($rutaArchivo)) 
            return response()->file($rutaArchivo);
        else 
            abort(404); 
    }
    public function actSaveCciDel()
    {
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
		$pdf->AddPage();
		// --------------------cabecera
		$pdf->Image('img/panelAdm/logoFile.png',10,10,15);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(190,5,utf8_decode('GOBIERNO REGIONAL DE APURIMAC'),$marco,1,'C');
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(190,3,utf8_decode('SubGerencia de Abastecimientos y Servicios'),$marco,1,'C');
		$pdf->Cell(190,3,utf8_decode('Auxiliares'),$marco,1,'C');
		$pdf->ln(5);
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

		$nombreArchivo = 'formato_' . $p->idPro . '.pdf';
	    $rutaArchivo = 'public/formatos/' . $nombreArchivo;
		if (Storage::exists($rutaArchivo)) 
		{
			Storage::delete($rutaArchivo);
			// if(Storage::delete($rutaArchivo))
        }
        $pdf->Output(storage_path('app/public/formatos/'.$nombreArchivo), 'F');
		return response()->json(['estado' => true,'msg' => 'PDF generado y guardado correctamente','pdf' => $nombreArchivo]);
    }
    public function actSaveDjDel()
    {
    	$p = Session::get('proveedor');
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
    	// -------------------
    	$marco = 0;
    	$smarco = 0;
    	$blanco = '';
    	$fondo = true;
    	$tam = 3.5;
    	$sl = 2;

    	$pdf = new Fpdf('P','mm','a4');
		$pdf->AddPage();
		// --------------------cabecera
		$pdf->Image('img/panelAdm/logoFile.png',10,10,15);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(190,5,utf8_decode('GOBIERNO REGIONAL DE APURIMAC'),$marco,1,'C');
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(190,3,utf8_decode('SubGerencia de Abastecimientos y Servicios'),$marco,1,'C');
		$pdf->Cell(190,3,utf8_decode('Auxiliares'),$marco,1,'C');
		$pdf->ln(5);
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

		// $pdf->Output();
		$nombreArchivo = 'formato_' . $p->idPro . '.pdf';
	    $rutaArchivo = 'public/formatos/' . $nombreArchivo;
		if (Storage::exists($rutaArchivo)) 
		{
			Storage::delete($rutaArchivo);
        }
        $pdf->Output(storage_path('app/public/formatos/'.$nombreArchivo), 'F');
		return response()->json(['estado' => true,'msg' => 'PDF generado y guardado correctamente','pdf' => $nombreArchivo]);
    }
    public function actSaveAnexo5Del()
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

		$fechaActual = Carbon::now();

		// Obtén las partes de la fecha
		$dia = $fechaActual->format('d');
		$mes = $fechaActual->format('F');
		$anio = $fechaActual->format('Y');

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
		$pdf->Cell(170,$tam+2.5,'Abancay '.$dia.' de '.$mes.' del '.$anio,$marco,0,'R');
		$pdf->Cell(10,$tam+2.5,'',$marco,0,'L');


$pdf->ln(48);
		// firma
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(190,$tam,utf8_decode('.....................................................'),$marco,1,'C');
		$pdf->Cell(190,$tam,utf8_decode('Firma, Nombres y Apellidos del postor o'),$marco,1,'C');
		$pdf->Cell(190,$tam,utf8_decode('Representante legal, segun corresponda'),$marco,1,'C');


		// $pdf->Output();
  		// exit;
		$nombreArchivo = 'formato_' . $p->idPro . '.pdf';
	    $rutaArchivo = 'public/formatos/' . $nombreArchivo;
		if (Storage::exists($rutaArchivo)) 
		{
			Storage::delete($rutaArchivo);
        }
        $pdf->Output(storage_path('app/public/formatos/'.$nombreArchivo), 'F');
		return response()->json(['estado' => true,'msg' => 'PDF generado y guardado correctamente','pdf' => $nombreArchivo]);
    }

}
