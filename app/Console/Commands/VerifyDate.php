<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use App\Models\TCotizacion;
use App\Models\TRecotizacion;
use App\Models\TSuspension;
use App\Models\TProveedor;

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
        // $cotizacionesVencidas = TCotizacion::where('fechaFinalizacion', '<', Carbon::now()->toDateString())->get();

        // $cotizacionesVencidas = TCotizacion::whereDate('fechaFinalizacion', '<', Carbon::now()->toDateString())
        //     ->orWhere(function($query) {
        //         $query->whereDate('fechaFinalizacion', Carbon::now()->toDateString())
        //               ->whereTime('horafinalizacion', '<', Carbon::now()->toTimeString());
        //     })
        //     ->get();
        $cotizacionesVencidas = TCotizacion::whereDate('fechaFinalizacion', '<', Carbon::now()->toDateString())
            ->orWhere(function($query) {
                $query->whereDate('fechaFinalizacion', Carbon::now()->toDateString())
                      ->whereTime('horaFinalizacion', '<', Carbon::now()->format('g:i A'))
                      ->where('estadoCotizacion','2');
            })
            ->get();

        $recotizacionesVencidas = TRecotizacion::whereDate('fechaFinalizacion', '<', Carbon::now()->toDateString())
            ->orWhere(function($query) {
                $query->whereDate('fechaFinalizacion', Carbon::now()->toDateString())
                      ->whereTime('horaFinalizacion', '<', Carbon::now()->format('g:i A'))
                      ->where('estadoRecotizacion','1');
            })
            ->get();

        $suspensionesVencidas = TSuspension::whereDate('fechaFinalizacion', '<', Carbon::now()->toDateString())
            ->where('estadoSuspension','1')
            ->get();

        foreach ($cotizacionesVencidas as $cotizacion) 
        {
            $cotizacion->estadoCotizacion = '3';
            $cotizacion->save();
        } 
        foreach ($recotizacionesVencidas as $recotizacion) 
        {
            $recotizacion->estadoRecotizacion = '0';
            if($recotizacion->save())
            {
                $cot = TCotizacion::find($recotizacion->idCot);
                $cot->estadoCotizacion = '3';
                $cot->save();
            }
        } 
        foreach ($suspensionesVencidas as $suspension) 
        {
            $suspension->estadoSuspension = '0';
            if($suspension->save())
            {
                $pro = TProveedor::find($suspension->idPro);
                $pro->estadoProveedor = '1';
                $pro->save();
            }
        } 
    }
}
