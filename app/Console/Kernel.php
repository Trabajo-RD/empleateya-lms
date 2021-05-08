<?php

namespace App\Console;

use App\Console\Commands\EmailInactiveUsers;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Jobs\SendLoginReminderEmailJob;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        EmailInactiveUsers::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // Send notification email when users not loged before "7 days"
        $schedule->command('email:inactive-users')
            ->weekly();

        $now = Carbon::now();
        $month = $now->format('F');
        $year = $now->format('yy');

        $fourthFridayMonthly = new Carbon('fourth friday of ' . $month . ' ' . $year);

        // $schedule->job(new SendLoginReminderEmailJob)->monthlyOn($fourthFridayMonthly->format('d'), '16:30');

        $schedule->job(new SendLoginReminderEmailJob)->everyMinute();


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
