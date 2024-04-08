<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TCotizacion extends Model
{
    protected $table='cotizacion';
	protected $primaryKey='idCot';
	public $incrementing=false;
	public $timestamps=false;

    protected $fillable = [
        'idCot', 
        'idUsu',
        'meta',
        'numeroCotizacion', 
        'tipo', 
        'unidadEjecutora',
        'documento',
        'fechaCotizacion',
        'horaCotizacion',
        'fechaFinalizacion',
        'horaFinalizacion',
        'concepto',
        'descripcion',
        'archivo',
        'archivoPdf',
        'anexoPdf',
        'estadoCotizacion',
        'estado',
        'fr',
        'fa'
    ];
}
