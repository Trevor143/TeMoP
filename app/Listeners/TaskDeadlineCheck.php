<?php

namespace App\Listeners;

use App\Mail\TaskDeadlineReminderEmail;
use App\Tender;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class TaskDeadlineCheck
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $tenders = Tender::all();
        foreach ($tenders as $tender){
            $tasks = $tender->tasks;
            foreach ($tasks as $task){
                if ($task->type == 'task'){
                    $deadline = $task->start_date->addDays($task->duration);
                    if($deadline <= $deadline->subDays(2)){
                        if ($tender->company)
                        foreach($tender->company as $company){
                            Mail::to($company->email)->send(new TaskDeadlineReminderEmail());
                        }
                    }
                }
            }
        }
    }
}
