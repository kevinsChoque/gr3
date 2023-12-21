<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TUm extends Model
{
    protected $table='unidadmedida';
	protected $primaryKey='idUm';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'idUm', 
        'nombre', 
        'descripcion', 
        'estado',
        'fr',
    ];
}
