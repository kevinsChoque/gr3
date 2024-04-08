<?php
$serverName = '10.19.0.3';
$serverName = 'localhost';
// $serverName = 'informatica2-pc\sicem_bd';

$connectionInfo = array("Database"=>"SIGA","UID"=>"sis_coti","PWD"=>"Admin@2026","CharacterSet"=>"UTF-8");
$connectionInfo = array("Database"=>"Amigos","UID"=>"kevins","PWD"=>"@emusap1@","CharacterSet"=>"UTF-8");
// $connectionInfo = array("Database"=>"SICEM_AB","UID"=>"comercial","PWD"=>"1","CharacterSet"=>"UTF-8");
$conn_sis = sqlsrv_connect($serverName,$connectionInfo);

if($conn_sis)
{
	echo("con exitosa");
	echo "<br>";
	// exit();
	// exit();
	// $tsql = "select top 10 * from CONEXION";  
	$tsql = "select * from items";  
// 	$tsql = "select NOMBRE_ITEM AS 'ITEM',CANTIDAD,um.NOMBRE AS 'UNIDAD MEDIDA' from UNIDAD_MEDIDA um
// inner join SIG_PAAC_ITEM pit on um.UNIDAD_MEDIDA = pit.UNIDAD_MEDIDA
// inner join CATALOGO_BIEN_SERV_ORIGINAL cbs on pit.GRUPO_BIEN=cbs.GRUPO_BIEN and pit.CLASE_BIEN=cbs.CLASE_BIEN and pit.FAMILIA_BIEN = cbs.FAMILIA_BIEN and pit.ITEM_BIEN =cbs.ITEM_BIEN
// where ANO_EJE= 2024 and NRO_CONSOLID=2279";  




	// $tsql = "select co.*, rz.CalDes, rz.CalTip, rl.UrbDes, rl.UrbTip  from CONEXION co inner join RZCALLE rz on co.PreCalle=rz.CalCod inner join RLURBA rl on co.PreUrba=rl.UrbCod where co.Confiax=CONVERT(varchar,GETDATE(),5) or InscriNro=000179139 or InscriNro=00130687";s
// 	$tsql = "select co.*, rz.CalDes, rz.CalTip, rl.UrbDes, rl.UrbTip  
// 	from CONEXION co 
// 	inner join RZCALLE rz on co.PreCalle=rz.CalCod 
// 	inner join RLURBA rl on co.PreUrba=rl.UrbCod 
// where co.Clilelx in ('31041142','31022852','46269224')";
	$stmt = sqlsrv_query($conn_sis, $tsql); 
	$arreglo = array(); 
	$html='';
	while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
	    // echo $row['Clinomx'].", ".$row['Clilelx']."<br />";
	    $arreglo[] = $row;
	    // $html=$html.'<tr class="text-center">'.
     //        '<td>'.$row['dni'].'</td>'.
     //    '</tr>';
        $html=$html.'<tr class="text-center">'.
            '<td>'.$row['cantidad'].'</td>'.
        '</tr>';
	}
	// echo $arreglo[0]['Clinomx'];
	echo $html;
	// echo json_decode($arreglo);
}
else
{
	echo("fallo");
	die(print_r(sqlsrv_errors(),true));
}