<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\TCotizacion;

class CambiarEstadoCotizacion implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // echo('llego aki');
        $r = TCotizacion::find(25);
        $r->descripcion = 'csa';
        $r->save();
        
        // $cotizacionesVencidas = TCotizacion::where('fechaFinalizacion', '<', now())->get();

        // foreach ($cotizacionesVencidas as $cotizacion) 
        // {
        //     $cotizacion->estadoCotizacion = '3';
        //     $cotizacion->save();
        // }    
    }
}
