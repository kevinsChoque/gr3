<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\TCotizacion;
use Illuminate\Support\Carbon;

class VerifyDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:verify-date';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command Artisan';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $r = TCotizacion::find(25);
        // $r->descripcion = 'csa';
        // $r->save();

        $cotizacionesVencidas = TCotizacion::where('fechaFinalizacion', '<', Carbon::now()->toDateString())->get();

        foreach ($cotizacionesVencidas as $cotizacion) 
        {
            $cotizacion->estadoCotizacion = '3';
            $cotizacion->save();
        } 
    }
}
