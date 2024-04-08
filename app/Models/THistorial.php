<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class THistorial extends Model
{
    protected $table='historial';
	protected $primaryKey='idHis';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'idHis', 
        'idUsu', 
        'idPro', 
        'idCot',
        'accion',
        'fecha',
    ];
}
