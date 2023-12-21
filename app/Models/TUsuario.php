<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TUsuario extends Model
{
    protected $table='usuario';
	protected $primaryKey='idUsu';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'idUsu', 
        'dni',
        'nombre', 
        'apellidoPaterno', 
        'apellidoMaterno',
        'usuario',
        'password',
        'celular',
        'correo',
        'tipo',
        // 'acceso',
        'estado',
        'fr',
        'fa'

    ];
}
