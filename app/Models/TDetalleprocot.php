<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TDetalleprocot extends Model
{
    protected $table='detalleprocot';
	protected $primaryKey='idCrp';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'idDpc', 
        'idCrp',
        'idItm', 
        'garantia',
        'marca',
        'modelo', 
        'precio',
        'archivo',
    ];
}
