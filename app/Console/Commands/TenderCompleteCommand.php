<?php

namespace App\Console\Commands;

use App\Mail\TenderCompleteMail;
use App\Models\Tender;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TenderCompleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tender:complete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notifies administrators of completion of all clauses';

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

        foreach ($tenders as $tender)
        {
            if ($tender->bids->count() > 0) {
                $project = $tender->tasks->where('type', 'project')->pluck('id')->toArray();
                $count = $tender->tasks->where('complete', true)
                    ->where('complete_confirm', true)->except($project)->count();
                $tasks = $tender->tasks->except($project)->count();
                if ($count == $tasks) {
                    Mail::to($tender->user->map->only('email'))->send(new TenderCompleteMail($tender));
                    sleep(2);
                }
            }
        }
    }
}
