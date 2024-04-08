<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DbExternaController extends Controller
{
    public function actTest()
    {
    	// dd('entro aki');
		// Datos de conexión
		$host = 'localhost'; // Cambia esto si tu base de datos está en un servidor remoto
		$dbname = 'nombre_base_de_datos';
		$username = 'usuario';
		$password = 'contraseña';

		try {
		    // Crear una nueva instancia de PDO
		    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		    
		    // Configurar PDO para que lance excepciones en caso de errores
		    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    
		    echo "Conexión exitosa a la base de datos!";
		    
		    // Ahora puedes ejecutar consultas SQL utilizando $pdo
		    // Por ejemplo:
		    /*
		    $query = "SELECT * FROM tabla";
		    $statement = $pdo->query($query);
		    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
		    foreach ($results as $row) {
		        // Hacer algo con cada fila
		    }
		    */
		} catch (PDOException $e) {
		    // Si hay errores en la conexión, mostrar el mensaje de error
		    die("Error en la conexión a la base de datos: " . $e->getMessage());
		}


    }
}
