<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TCotxitm extends Model
{
    protected $table='cotxitm';
	protected $primaryKey='idCi';
	public $incrementing=false;
	public $timestamps=false;

    protected $fillable = [
        'idCi', 
        'idCot', 
        'idItm', 
        'nombre',
        'um',
        'cantidad',
        'estado',
        'fr',
    ];
}
