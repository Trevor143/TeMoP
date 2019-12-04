<?php

namespace App\Console;

use App\Console\Commands\TaskDeadlineReminderCommand;
use App\Console\Commands\TenderCompleteCommand;
use App\Events\TaskDeadlineReminderEvent;
use App\Mail\TaskDeadlineReminderEmail;
use App\Tender;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        TaskDeadlineReminderCommand::class,
        TenderCompleteCommand::class,
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->command('inspire')
                  ->hourly();
         $schedule->command('task:remind')->daily();
         $schedule->command('tender:complete')->daily();
//        $schedule->call(function (){
//            $tenders = Tender::all();
//            foreach ($tenders as $tender){
//                $tasks = $tender->tasks;
//                foreach ($tasks as $task){
//                    if ($task->type == 'task'){
//                        $deadline = $task->start_date->addDays($task->duration);
//                        if($deadline <= $deadline->subDays(2)){
//                            if ($tender->company)
//                                foreach($tender->company as $company){
//                                    Mail::to($company->email)->send(new TaskDeadlineReminderEmail());
//                                }
//                        }
//                    }
//                }
//            }
//        })->everyFiveMinutes();
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
