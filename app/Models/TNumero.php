<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TNumero extends Model
{
    protected $table='numero';
	protected $primaryKey='id';
	public $incrementing=true;
	public $timestamps=false;

    protected $fillable = [
        'id', 
        'numero', 
        'estado', 
    ];

    
}
