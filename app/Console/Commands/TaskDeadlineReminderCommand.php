<?php

namespace App\Console\Commands;

use App\Mail\TaskDeadlineReminderEmail;
use App\Models\Tender;
use App\Task;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TaskDeadlineReminderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:remind';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Task deadline reminder is deadline is close';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tenders = Tender::all();
        foreach ($tenders as $tender){
            $emails = $tender->company->map->only('email');
            $tasks = $tender->tasks->where('type','task');
            foreach ($tasks as $task){

                $deadline = $task->start_date->addDays($task->duration);
                if($deadline->diffInDays(Carbon::today()) <= 3) {
                    Mail::to($emails)->send(new TaskDeadlineReminderEmail($task));
                    sleep(3);
                }
            }
        }
//        return "Users have been notified";
    }
}
