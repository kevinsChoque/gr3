<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TItem extends Model
{
    protected $table='item';
	protected $primaryKey='idItm';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'idItm', 
        'nombre', 
        'descripcion', 
        'clasificador',
        'estado',
        'fr',
        'fa'
    ];
}
