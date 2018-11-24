<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->command('larabbs:calculate-active-user')->hourly()->when(function () {
            return Cron::shouldIRun('larabbs:calculate-active-user', 60); //returns true every 60 minutes
        });
        // 每日零时执行一次
        $schedule->command('larabbs:sync-user-actived-at')->dailyAt('00:00')->when(function () {
            return Cron::shouldIRun('larabbs:sync-user-actived-at', 60*24); //returns true every 24 hours
        });;
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
