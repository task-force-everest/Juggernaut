<?php

namespace App\Console;

use App\Console\Commands\AddTimeOfService;
use App\Console\Commands\ArchiveFlightPlans;
use App\Console\Commands\ClearLOA;
use App\Console\Commands\ClearLoadout;
use App\Models\Overlord\Heartbeat;
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
        \App\Console\Commands\CreateAvatar::class,
        \App\Console\Commands\CreateSearchable::class,
        \App\Console\Commands\SquadXML::class,
        \App\Console\Commands\UpdateTeamspeak::class,
        \App\Console\Commands\CreateCAC::class,
        \App\Console\Commands\AddNewPERSTAT::class,
        ArchiveFlightPlans::class,
        AddTimeOfService::class,
        ClearLoadout::class,
        ClearLOA::class,
        \App\Console\Commands\heartbeat::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        // Member
        $schedule->command('member:avatar')
            ->daily();
        $schedule->command('member:cac')
            ->daily();
        $schedule->command('member:searchable')
            ->daily();
        $schedule->command('member:clear-loa')
            ->daily();
        $schedule->command('member:squadxml')
            ->daily();
        $schedule->command('member:create-perstat')
            ->weekly()->saturdays()->at('6:00');

        // MISC
        $schedule->command('catalyst:credit-tig')
            ->daily();
        $schedule->command('aviation:flight-plan-archive')
            ->daily();

        // BACKUP
        $schedule->command('backup:clean')->weekly()->at('01:00');
        $schedule->command('backup:run')->weekly()->at('02:00');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
