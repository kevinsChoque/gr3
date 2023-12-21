<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TSuspension extends Model
{
    protected $table='suspension';
	protected $primaryKey='idSus';
	public $incrementing=true;
	public $timestamps=false;
    protected $fillable = [
        'idSus', 
        'idPro', 
        'motivo',
        'obs', 
        'archivo',
        'fechaInicio', 
        'fechaFinalizacion',
        'estadoSuspension',
        'fr',
        'fa'
    ];
}
