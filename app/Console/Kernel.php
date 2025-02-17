<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * These commands will be run in a single, sequential run.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('scrape:products')
                ->daily()
                ->at('02:00')
                ->emailOutputOnFailure('ton@email.com');

        // Générer le sitemap tous les jours à minuit et pinger Google
        $schedule->command('sitemap:generate')
                ->dailyAt('01:00')
                ->then(function () {
                    // Ping Google
                    file_get_contents('https://www.google.com/ping?sitemap=' . urlencode('https://showroombeauty.fr/sitemap.xml'));
                });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
