<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Laravelista\Comments\Commentable;

class Task extends Model
{
    use Commentable;

    protected $appends = ["open"];
    protected $fillable = ['text', 'start_date','duration','progress', 'parent'];
    protected $dates = ['start_date'];
//    protected $observables = ['deadline'];

    public function deadline(){
        $tenders = Tender::all();
        foreach ($tenders as $tender){
            $tasks = $tender->tasks;
            foreach ($tasks as $task){
                if ($task->type == 'task'){
                    $deadline = $task->start_date->addDays($task->duration);
                    if($deadline <= 2){
//                        Mail::to()
                }
//            Mail::to()
                }
            }
        }

        $this->fireModelEvent('deadline');
    }

    public function getOpenAttribute(){
        return true;
    }

    public function tender()
    {
        return $this->belongsTo('App\Models\Tender');
    }
    public  function user(){
        return $this->belongsTo('App\Models\BackpackUser', 'owners');
    }
}
