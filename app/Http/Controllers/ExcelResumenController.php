<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Exports\UsersExport;
// use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Illuminate\Support\Facades\Storage;

use App\Models\TCotizacion;
use App\Models\TCotxitm;
use App\Models\TCotrecpro;
use App\Models\TDetalleprocot;

class ExcelResumenController extends Controller
{
    public function export_b()
    {
    	// dd('export');
    	dd('llego aki export');
        // return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function export(Request $r, $idCot=null)
    {
    	// dd($idCot);
    	$items = TCotxitm::where('idCot',$idCot)->orderBy('nombre')->get();
    	$cotizacion = TCotizacion::find($idCot);
    	// dd($items);
    	$numContador = 0;
    	$data = [];
    	$ordenItem = array();
    	$cantidadItem = array();
    	$contadorOrdenItem=7;

    	$totalesProveedores = [];
    	$colTotalesProveedores = [];

    	// Aplicar el estilo de borde a las celdas
		$styleArray = [
		    'borders' => [
		        'allBorders' => [
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		            'color' => ['argb' => '000000'],
		        ],
		    ],
		];
		$estilosCeldaPrincipal = [
			'borders' => [
		        'allBorders' => [
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		            'color' => ['argb' => '000000'],
		        ],
		    ],
		    'fill' => [
		        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
		        'startColor' => [
		            'argb' => 'FFB0E0E6', //fondo
		        ],
		    ],
		    'font' => [
		        'color' => [
		            'argb' => 'FF0000FF', //texto
		        ],
		        'bold' => true, //Negrita
		    ],
		];

		for ($i = 0; $i < count($items); $i++) 
		{
		    $numContador++; 
		    $contadorOrdenItem++;
		    $data[] = [
		        $numContador,    
		        $items[$i]->nombre,   
		        $items[$i]->um,     
		        $items[$i]->cantidad, 
		    ];
		    $ordenItem[$items[$i]->idCi] = $contadorOrdenItem;
		    $cantidadItem[$items[$i]->idCi] = $items[$i]->cantidad;
		}
		// dd($ordenItem);
		$templatePath = 'templates/t2.xlsx';
	    $spreadsheet = IOFactory::load(Storage::path($templatePath));
	    $sheet = $spreadsheet->getActiveSheet();
	    // ------------------------------------------------------------------------------esto en procedimiento
	    $sheet->setCellValue('b1', 'COTIZACION NUMERO '.$cotizacion->numeroCotizacion);
	    $sheet->mergeCells("b1:e1");
	    $alignment = $sheet->getStyle('b1')->getAlignment();
	    $alignment->setVertical(Alignment::VERTICAL_CENTER);
	    $alignment->setHorizontal(Alignment::HORIZONTAL_CENTER);
	    $sheet->getStyle("b1:e1")->applyFromArray($estilosCeldaPrincipal);
	    $sheet->getRowDimension(1)->setRowHeight(30);

	    $sheet->mergeCells('b2:b7');
	    $sheet->setCellValue('b2', 'ITEM');
	    $sheet->mergeCells('c2:c7');
	    $sheet->setCellValue('c2', 'DESCRIPCION');
	    $sheet->mergeCells('d2:d7');
	    $sheet->setCellValue('d2', 'UNIDAD DE MEDIDA');
	    $sheet->mergeCells('e2:e7');
	    $sheet->setCellValue('e2', 'CANTIDAD');

		
		$sheet->getColumnDimension('b')->setWidth(6);
		$sheet->getColumnDimension('c')->setWidth(21);
		$sheet->getColumnDimension('d')->setWidth(21);
		$sheet->getColumnDimension('e')->setWidth(12);
		// Establecer el estilo de alineación vertical y horizontal
	    $alignment = $sheet->getStyle('b2')->getAlignment();
	    $alignment->setVertical(Alignment::VERTICAL_CENTER);
	    $alignment->setHorizontal(Alignment::HORIZONTAL_CENTER);

	    $alignment = $sheet->getStyle('c2')->getAlignment();
	    $alignment->setVertical(Alignment::VERTICAL_CENTER);
	    $alignment->setHorizontal(Alignment::HORIZONTAL_CENTER);

	    $alignment = $sheet->getStyle('d2')->getAlignment();
	    $alignment->setVertical(Alignment::VERTICAL_CENTER);
	    $alignment->setHorizontal(Alignment::HORIZONTAL_CENTER);

	    $alignment = $sheet->getStyle('e2')->getAlignment();
	    $alignment->setVertical(Alignment::VERTICAL_CENTER);
	    $alignment->setHorizontal(Alignment::HORIZONTAL_CENTER);
	    // ------------------------------------------------------------------------------
		$sheet->fromArray($data, null, 'b8');
		// -----------------
		// -----------------
		// -----------------
		// Llenar la hoja de cálculo con los datos
		// $sheet->fromArray($data, null, 'b8');

		// Aplicar bordes a las celdas ocupadas por los datos
		$numFilasData = count($data);
		$numColumnasData = count($data[0]); // Suponiendo que todas las filas tienen la misma cantidad de columnas

		// Definir el rango de celdas ocupadas por los datos
		$rangoCeldas = "B8:" . chr(ord('B') + $numColumnasData - 1) . ($numFilasData + 7);

		
		$sheet->getStyle($rangoCeldas)->applyFromArray($styleArray);
		// -----------------
		// -----------------
		// -----------------

		

		// ------------------------------------------------------------------------------poner los items de los proveedores
		$proveedores = TCotrecpro::where('idCot',$idCot)->where('estadoCrp','1')->orderBy('fr')->get();
		// dd(count($proveedores));
		$valor = 'Valor de ejemplo';
		$columnaInicial = 'g';
		$incrementoColumna = 3;
		$filas = 8;
		$borderStyle = [
		    'borders' => [
		        'allBorders' => [
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		            'color' => ['argb' => '000000'],
		        ],
		    ],
		];
		$totalProveedor = 0;
		for ($i = 0; $i < count($proveedores); $i++) {
		    $columna = chr(ord($columnaInicial) + ($i * $incrementoColumna));
		    // dd($proveedores[$i]);
		    $detallePostulacion = TDetalleprocot::where('idCrp',$proveedores[$i]->idCrp)->get();

		    for ($j = 0; $j < count($detallePostulacion); $j++)
		    {
		    	$precio = $this->encryp_mount($detallePostulacion[$j]->precio);
				$subTotal = $precio*$cantidadItem[$detallePostulacion[$j]->idItm];

		    	$celda = $columna . $ordenItem[$detallePostulacion[$j]->idItm];
		    	$sheet->setCellValue($celda, $subTotal);
		    	$sheet->getStyle($celda)->applyFromArray($borderStyle);


		    	$totalProveedor = $totalProveedor+$subTotal;
		    	
		    	$colAde = chr(ord($columna) - 1);
		    	// $pu = $precio/$cantidadItem[$detallePostulacion[$j]->idItm];
		    	$celdaAde = $colAde . $ordenItem[$detallePostulacion[$j]->idItm];
		    	$sheet->setCellValue($celdaAde, $precio);
		    	$sheet->getStyle($celdaAde)->applyFromArray($borderStyle);

		    	$colAtr = chr(ord($columna) + 1);
		    	$marca = empty($detallePostulacion[$j]->marca)?'-':$this->encryp_mount($detallePostulacion[$j]->marca);
		    	$celdaAtr = $colAtr . $ordenItem[$detallePostulacion[$j]->idItm];
		    	$sheet->setCellValue($celdaAtr, $marca);
		    	$sheet->getStyle($celdaAtr)->applyFromArray($borderStyle);
		    }
		    $totalesProveedores[] = $totalProveedor;
		    $colTotalesProveedores[] = $columna;
		    $totalProveedor = 0;
		    // dd($detallePostulacion);
		    // encryp_mount
		    // $celda = $columna . $filas;
		    // $sheet->setCellValue($celda, $valor);
		}
		// dd($totalesProveedores,$colTotalesProveedores);
		$proveedores = TCotrecpro::select('proveedor.*')
			->join('proveedor', 'cotrecpro.idPro', '=', 'proveedor.idPro')
			->where('idCot',$idCot)
			->where('estadoCrp','1')
			->orderBy('fr')
			->get();
		// ------------------------------------------------------------------------------
		// ------------------------------------------------------------------------------CREANDO EL HEADER principal
		$numCeldasCombinar = count($proveedores) * 3;
		$letraColumnaFinal = chr(ord('F') + $numCeldasCombinar - 1);
		$hastaColumna = $letraColumnaFinal.'2';
		// dd($hastaColumna);
		// Combinar celdas desde F2 hasta la columna final y la misma fila
		$sheet->setCellValue('f2', 'COTIZACION PROVEEDOR');
		$sheet->mergeCells("f2:$hastaColumna");

		$alignment = $sheet->getStyle('f2')->getAlignment();
		$alignment->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle("f2:$hastaColumna")->applyFromArray($borderStyle);
		// ------------------------------------------------------------------------------CREANDO EL HEADER principal
		// ------------------------------------------------------------------------------CREANDO HEADER proveedor
		// ----poner tamaño de ancho de columna
		

		$columnaInicialHader = 'F'; // Columna inicial para combinar celdas
		$columnaFinalHeader = ''; // Columna final para combinar celdas

		$columnaInicialNombre = 'F'; // Columna inicial para combinar celdas
		$columnaFinalNombre = ''; // Columna final para combinar celdas

		$columnaRuc = 'F';

		$columnaInicialRuc = 'F'; 
		$columnaFinalRuc = ''; 

		$columnaTel = 'F';

		$columnaInicialTel = 'F'; 
		$columnaFinalTel = ''; 

		$columnaPu = 'F';
		$columnaTo = 'G';
		$columnaMa = 'H';
// dd(count($proveedores));
		for ($i = 0; $i < count($proveedores); $i++) 
		{

		    $columnaFinalHeader = chr(ord($columnaInicialHader) + 2); // Aumentar en 2 para obtener un rango de 3 columnas
			$celdaInicialHeader = $columnaInicialHader.'3';
			$celdaFinalHeader = $columnaFinalHeader.'3';
			$bloqueHeader = $celdaInicialHeader.':'.$celdaFinalHeader;
			// configuracion de celda
		    $alignment = $sheet->getStyle($celdaInicialHeader)->getAlignment();
		    $alignment->setHorizontal(Alignment::HORIZONTAL_CENTER);
		    $sheet->getStyle($bloqueHeader)->applyFromArray($borderStyle);

		    $sheet->setCellValue($celdaInicialHeader, 'Postor Nª'.$i+1);
		    $sheet->mergeCells($bloqueHeader);
		    // Preparar para la próxima iteración
		    $columnaInicialHader = chr(ord($columnaFinalHeader) + 1); // Aumentar en 1 para moverse a la siguiente columna
		    // --------------------------------------------------------------------------------
		    // --------------------------------------------------------------------------------
		    // --------------------------------------------------------------------------------
		    $columnaFinalNombre = chr(ord($columnaInicialNombre) + 2); // Aumentar en 2 para obtener un rango de 3 columnas
			$celdaInicialNombre = $columnaInicialNombre.'4';
			$celdaFinalNombre = $columnaFinalNombre.'4';
			$bloqueNombre = $celdaInicialNombre.':'.$celdaFinalNombre;
			// configuracion de celda
		    $alignment = $sheet->getStyle($celdaInicialNombre)->getAlignment();
		    $alignment->setHorizontal(Alignment::HORIZONTAL_CENTER);
		    $sheet->getStyle($bloqueNombre)->applyFromArray($borderStyle);

		    $sheet->setCellValue($celdaInicialNombre, $proveedores[$i]->tipoPersona=="PERSONA NATURAL"?
		    	$proveedores[$i]->nombre.' '.$proveedores[$i]->apellidoPaterno.' '.$proveedores[$i]->apellidoMaterno: 
		    	$proveedores[$i]->razonSocial
		    );
		    $sheet->mergeCells($bloqueNombre);
		    // Preparar para la próxima iteración
		    $columnaInicialNombre = chr(ord($columnaFinalNombre) + 1); // Aumentar en 1 para moverse a la siguiente columna
		    // --------------------------------------------------------------------------------
		    // --------------------------------------------------------------------------------
		    // --------------------------------------------------------------------------------
	    	$celda = $columnaRuc.'5';
	    	$sheet->setCellValue($celda, 'RUC');
	    	$sheet->getStyle($celda)->applyFromArray($borderStyle);
	    	$columnaRuc = chr(ord($columnaRuc) + 3);
			// --------------------------------------------------------------------------------
		    // --------------------------------------------------------------------------------
		    // --------------------------------------------------------------------------------
		    $columnaInicialRuc = chr(ord($columnaInicialRuc) + 1);
			$columnaFinalRuc = chr(ord($columnaInicialRuc) + 1); // Aumentar en 2 para obtener un rango de 3 columnas
			$celdaInicialRuc = $columnaInicialRuc.'5';
			$celdaFinalRuc = $columnaFinalRuc.'5';
			$bloqueRuc = $celdaInicialRuc.':'.$celdaFinalRuc;
			// configuracion de celda
		    $alignment = $sheet->getStyle($celdaInicialRuc)->getAlignment();
		    $alignment->setHorizontal(Alignment::HORIZONTAL_CENTER);
		    $sheet->getStyle($bloqueRuc)->applyFromArray($borderStyle);

		    $sheet->setCellValue($celdaInicialRuc, $proveedores[$i]->numeroDocumento);
		    $sheet->mergeCells($bloqueRuc);
		    // Preparar para la próxima iteración
		    $columnaInicialRuc = chr(ord($columnaFinalRuc) + 1); 
		    // --------------------------------------------------------------------------------
		    // --------------------------------------------------------------------------------
		    // --------------------------------------------------------------------------------
	    	$celda = $columnaTel.'6';
	    	$sheet->setCellValue($celda, 'TEL');
	    	$sheet->getStyle($celda)->applyFromArray($borderStyle);
	    	$columnaTel = chr(ord($columnaTel) + 3);
		    // --------------------------------------------------------------------------------
		    // --------------------------------------------------------------------------------
		    // --------------------------------------------------------------------------------
		    $columnaInicialTel = chr(ord($columnaInicialTel) + 1);
			$columnaFinalTel = chr(ord($columnaInicialTel) + 1); // Aumentar en 2 para obtener un rango de 3 columnas
			$celdaInicialTel = $columnaInicialTel.'6';
			$celdaFinalTel = $columnaFinalTel.'6';
			$bloqueTel = $celdaInicialTel.':'.$celdaFinalTel;
			// configuracion de celda
		    $alignment = $sheet->getStyle($celdaInicialTel)->getAlignment();
		    $alignment->setHorizontal(Alignment::HORIZONTAL_CENTER);
		    $sheet->getStyle($bloqueTel)->applyFromArray($borderStyle);

		    $sheet->setCellValue($celdaInicialTel, $proveedores[$i]->celular);
		    $sheet->mergeCells($bloqueTel);
		    // Preparar para la próxima iteración
		    $columnaInicialTel = chr(ord($columnaFinalTel) + 1); 
		    // --------------------------------------------------------------------------------
		    // --------------------------------------------------------------------------------
		    // --------------------------------------------------------------------------------
		    $sheet->getColumnDimension($columnaPu)->setWidth(12);

	    	$celda = $columnaPu.'7';
	    	$sheet->setCellValue($celda, 'P.UNITARIO');
	    	$sheet->getStyle($celda)->applyFromArray($borderStyle);
	    	$columnaPu = chr(ord($columnaPu) + 3);

	    	$celda = $columnaTo.'7';
	    	$sheet->setCellValue($celda, 'P.TOTAL');
	    	$sheet->getStyle($celda)->applyFromArray($borderStyle);
	    	$columnaTo = chr(ord($columnaTo) + 3);

	    	$celda = $columnaMa.'7';
	    	$sheet->setCellValue($celda, 'MARCA');
	    	$sheet->getStyle($celda)->applyFromArray($borderStyle);
	    	$columnaMa = chr(ord($columnaMa) + 3);

		}
		// ------------------------------------------------------------------------------CREANDO HEADER proveedor
		// ------------------------------------------------------------------------------SUMATORIA DE PRECIO TOTAL
		// dd($totalesProveedores[0],$colTotalesProveedores[0]);
		$filaSumatorias = count($data)+8; //data array de los items
		$sheet->setCellValue('c'.$filaSumatorias, 'MONTO TOTAL');
		$alignment = $sheet->getStyle('c'.$filaSumatorias)->getAlignment();
	    $alignment->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$sheet->getStyle('c'.$filaSumatorias)->applyFromArray($borderStyle);

		for ($i = 0; $i < count($totalesProveedores); $i++) 
		{
			// dd($colTotalesProveedores[$i].$filaSumatorias);
			$celda = $colTotalesProveedores[$i].$filaSumatorias;
			$sheet->setCellValue($celda, $totalesProveedores[$i]);
			$alignment = $sheet->getStyle($celda)->getAlignment();
		    $alignment->setHorizontal(Alignment::HORIZONTAL_CENTER);
			$sheet->getStyle($celda)->applyFromArray($borderStyle);
		}
		// ------------------------------------------------------------------------------SUMATORIA DE PRECIO TOTAL
	    $tempFilePath = tempnam(sys_get_temp_dir(), 'excel');
	    $writer = new Xlsx($spreadsheet);
	    $writer->save($tempFilePath);
	    return response()->download($tempFilePath, 'filled_template.xlsx')->deleteFileAfterSend();
    }
}
