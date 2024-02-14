<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\CambiarEstadoCotizacion;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        echo('start thread');
        $schedule->command('app:verify-date')->everyFiveSeconds();
        echo('end thread');
    }
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
