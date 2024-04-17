<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\THistorial;
use App\Models\TCotizacion;
use App\Models\TNumero;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected $ALG = "AES-256-CBC";
    // historial start
	protected $diccionario = [
        "/login/sigin" => "Ingreso al sistema",
        "/home/home" => "Ingreso al dashboard",

        "/proveedor" => "Ingreso a la seccion de Proveedor (Se muestran los registros)",
        "/proveedor/eliminar" => "Se elimino el proveedor",
        "/proveedor/guardar" => "Se registro nuevo proveedor",
        "/suspension/guardar" => "Se penalizo al proveedor",
        "/proveedor/guardarCambios" => "Se edito al proveedor",

        "/cotizacion/ver" => "Ingreso a la seccion de Cotizaciones (Se muestran los registros)",
        "/cotizacion/guardar" => "Se registro una nueva cotizacion con Numero",
        "/cotizacion/guardarCambios" => "Se edito la cotizacion con Numero",
        "/cotizacion/changeEstadoCotizacion" => "Se cambio el estado de la cotizacion con Numero",
        "/recotizacion/guardar" => "Se realizara una recotizacion de la cotizacion con Numero",
        
        "/postulaciones/ver" => "Ingreso a la seccion de Postulaciones (Se muestran los registros)",
        "/postulaciones/showPostulantes" => "Ingreso a ver las postulaciones de la cotizacion con Numero",
        
        "/login/logout" => "Se cerro la sesion",
        "/path/test" => "Sign in test",


        // diccionario para proveedor
        "/login/siginpro" => "Ingreso al sistema",
        "/panelAdm/paCotizacion/cotizacionesActivas" => "Ingreso a Cotizaciones activas",
        "/panelAdm/paCotizacion/showProCot" => "Ingreso a cotizar la cotizacion con Numero",
        "/panelAdm/paCotRecPro/guardar" => "Realizo la postulacion a la cotizacion con Numero",
        "/panelAdm/paCotizacion/misCotizaciones" => "Ingreso a la lista de MIS COTIZACIONES",
        "/panelAdm/paCotRecPro/subirArchivo" => "Se envio el archivo de cotizacion, se finalizo la cotizacion con Numero",
        "/loginProveedor/logoutPro" => "Se cerro la sesion",
        "/panelAdm/paProveedor/savePassword" => "El proveedor cambio su contraseña.",
        "/panelAdm/paProveedor/guardar" => "El proveedor actualizo sus datos personales.",
        "/aaa/aaa" => "Ingreso al sistema",
    ];

    protected $listRepet = array("/proveedor", 
    	"/cotizacion/ver", 
    	"/postulaciones/ver", 
    	"/panelAdm/paCotizacion/misCotizaciones", 
    	"/panelAdm/paCotizacion/cotizacionesActivas",
    );
    public function historial($r)
    {
  //   	$usuario = Session::get('usuario');
		// dd($this->urlSplit($r),$usuario->nombre,$this->diccionario[$this->urlSplit($r)]);
		// dd(Session::has('usuario'));

    	// dd('llego aki historial');
		$url = $this->urlSplit($r);
		if(is_null(Session::get('lastAction')))
		{
			session()->put('lastAction', $url);
			try {

			    $his = new THistorial();
			    $his->idUsu = Session::has('usuario')==true?Session::get('usuario')->idUsu:null;
			    $his->idPro = $r->hidPro;
			    $his->idCot = $r->hidCot;
			    $his->accion = $this->diccionario[$url].' '.$r->hnombreProveedor.$r->hnumeroCotizacion;
			    $his->fecha = Carbon::now();

			    $his->save();
			}finally {}
		}
		else
		{
			if (Session::get('lastAction')!=$url)
			{
		    	try {

				    $his = new THistorial();
				    // $his->idUsu = Session::get('usuario')->idUsu;
				    $his->idUsu = Session::has('usuario')==true?Session::get('usuario')->idUsu:null;
				    $his->idPro = $r->hidPro;
				    $his->idCot = $r->hidCot;
				    $his->accion = $this->diccionario[$url].' '.$r->hnombreProveedor.$r->hnumeroCotizacion;
				    $his->fecha = Carbon::now();

				    $his->save();
				}finally {}
			}
			else
			{
				if (!in_array($url, $this->listRepet))
				{
			    	try {

					    $his = new THistorial();
					    // $his->idUsu = Session::get('usuario')->idUsu;
					    $his->idUsu = Session::has('usuario')==true?Session::get('usuario')->idUsu:null;
					    $his->idPro = $r->hidPro;
					    $his->idCot = $r->hidCot;
					    $his->accion = $this->diccionario[$url].' '.$r->hnombreProveedor.$r->hnumeroCotizacion;
					    $his->fecha = Carbon::now();

					    $his->save();
					}finally {}
				}
			}
			session()->put('lastAction', $url);
		}
    }
    public function urlSplit($r)
    {	
    	// dd(env('DOMINIO'),$r->url(),'entro urlSplit');
    	// return explode(env('DOMINIO'), $r->url())[1];
    	return explode("http://localhost/grc3/public", $r->url())[1];
    }
    public function razonSocialNombre($pro)
    {
    	if($pro->tipoPersona=="PERSONA NATURAL")
    		$nombre = "<b>(RUC: ".$pro->numeroDocumento.") ".$pro->nombre." ".$pro->apellidoPaterno." ".$pro->apellidoMaterno."</b>";
    	else
    		$nombre = "<b>(RUC: ".$pro->numeroDocumento.") ".$pro->razonSocial."</b>";
    	return $nombre;
    }
    public function estadoCotizacion($cot)
    {
    	$badgeEstado='';
	    if($cot->estadoCotizacion == '1') $badgeEstado='<span class="shadow badge badge-warning">En proceso</span>';
	    if($cot->estadoCotizacion == '2') $badgeEstado='<span class="shadow badge badge-success">Publicado</span>';
	    if($cot->estadoCotizacion == '3') $badgeEstado='<span class="shadow badge badge-primary">Finalizado</span>';
	    if($cot->estadoCotizacion == '4') $badgeEstado='<span class="shadow badge badge-danger">Corregir</span>';
	    if($cot->estadoCotizacion == '5') $badgeEstado='<span class="shadow badge badge-info">Recotizando</span>';
	    return $badgeEstado;
    }
    // historial end
    public function deepFile($file)
	{
	    $contenidoArchivo = $file->get();
	    $base64 = base64_encode($contenidoArchivo);
	    
	    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->ALG));

	    $encriptado = openssl_encrypt($base64, $this->ALG, env('KEY'), 0, $iv);
	    $cadenaCifrada = base64_encode($iv . $encriptado);

	    return $cadenaCifrada;
	}
	public function desencriptarDeepFile($cadenaCifrada)
	{
	    $decodificado = base64_decode($cadenaCifrada);

	    // Extraer el IV (vector de inicialización) de la cadena cifrada
	    $longitudIV = openssl_cipher_iv_length('AES-256-CBC');
	    $iv = substr($decodificado, 0, $longitudIV);

	    // Separar el texto cifrado del IV
	    $textoCifrado = substr($decodificado, $longitudIV);

	    // Desencriptar el texto cifrado
	    $base64Desencriptado = openssl_decrypt($textoCifrado, $this->ALG, env('KEY'), 0, $iv);

	    return $base64Desencriptado;
	}
	public function encryp_mount($cadena)
	{
		if (Str::startsWith($cadena, 'eyJpdiI6')) 
		    return Crypt::decryptString($cadena);
		else 
		    return Crypt::encryptString((string)$cadena);
	}
    // deep file end
    // numero de cotizacion
    public function numeroCotizacion()
    {
    	if(TCotizacion::count() == 0)
            return intval(TNumero::first()->numero)+1;
        $numeroMaximoCotizacion = intval(TCotizacion::max('numeroCotizacion'));
        $numero = intval(TNumero::first()->numero);

        if($numeroMaximoCotizacion>$numero)
            return $numeroMaximoCotizacion+1;
        else
            return $numero+1;

    }
}

