<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TRecotizacion extends Model
{
    protected $table='recotizacion';
	protected $primaryKey='idRec';
	public $incrementing=false;
	public $timestamps=false;

    protected $fillable = [
        'idRec', 
        'idCot',
        'motivo',
        'archivo', 
        'fechaCotizacion', 
        'fechaFinalizacion',
        'estadoRecotizacion',
        'fr',
    ];
}
