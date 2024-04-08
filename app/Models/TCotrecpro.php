<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TCotrecpro extends Model
{
    protected $table='cotrecpro';
	protected $primaryKey='idCrp';
	public $incrementing=false;
	public $timestamps=false;

    protected $fillable = [
        'idCrp', 
        'idCot',
        'idRec', 
        'idPro',
        'timeEntrega', 
        'timeValidez',
        'dedica',
        'timeGarantia',
        'archivo',
        'archivoPdf',
        'total',
        'obs',
        'estadoCrp',
        'estado',
        'fr',
        'fa'

    ];
}
