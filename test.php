<?php

$host = 'localhost'; 
$dbname = 'Amigos';
$username = 'grc3';
$password = '12345678';

$puerto = 1433;
echo("sqlsrv:Server=$host,$puerto;Database=$dbname");
try {
    $conn = new PDO("sqlsrv:Server=$host,$puerto;Database=$dbname", $username, $password);
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa a la base de datos!";
} catch (PDOException $e) {
    echo('<br>');
    die("Error en la conexión a la base de datos: " . $e->getMessage());
}


?>
