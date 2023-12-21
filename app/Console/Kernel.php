<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\CambiarEstadoCotizacion;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // php artisan schedule:work

        // $schedule->command('inspire')->hourly();

        // $schedule->command('inspire')->everyTenSeconds();
        echo('kernel');
        // CambiarEstadoCotizacion::dispatch();
        // $schedule->job(new CambiarEstadoCotizacion())->everyFiveSeconds();






        // --------------------
        // este es test, se usa para no esperar mucho
        $schedule->command('app:verify-date')->everyFiveSeconds();
        // este es el oficial
        // $schedule->command('app:verify-date')->everyThirtyMinutes();
        echo('--- end');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
