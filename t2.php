<?php
$serverName = 'localhost';
// $serverName = 'informatica2-pc\sicem_bd';

$connectionInfo = array("Database"=>"Amigos","UID"=>"kevins","PWD"=>"@emusap1@","CharacterSet"=>"UTF-8");
// $connectionInfo = array("Database"=>"SICEM_AB","UID"=>"comercial","PWD"=>"1","CharacterSet"=>"UTF-8");
$conn_sis = sqlsrv_connect($serverName,$connectionInfo);

if($conn_sis)
{
	echo("con exitosa");
	echo "<br>";
	// exit();
	// $tsql = "select top 10 * from CONEXION";  
	$tsql = "select * from cliente";  
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
	    $html=$html.'<tr class="text-center">'.
            '<td>'.$row['dni'].'</td>'.
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