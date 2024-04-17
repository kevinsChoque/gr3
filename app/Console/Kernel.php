<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\CambiarEstadoCotizacion;

use Illuminate\Support\Carbon;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        echo('start thread---c'.Carbon::now()->toDateString().'c---'.Carbon::now()->toDateString());
        $schedule->command('app:verify-date')->everyFiveSeconds();
        echo('---end thread---'.Carbon::now()->toTimeString().'---');
    }
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
