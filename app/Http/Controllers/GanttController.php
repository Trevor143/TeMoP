<?php

namespace App\Http\Controllers;

use App\Link;
use App\Models\Tender;
use App\Task;
use Illuminate\Http\Request;

class GanttController extends Controller
{
    public function get($id){
        $tasks = Task::where('tender_id', $id)->get();
        $links = new Link();
        $tender = Tender::find($id);

        return response()->json([
            "data" => $tasks->all(),
//                [
//                'id'=> $this->id,
//                'text'=> $this->text,
//                'start_date'=> $this->start_date,
//                'duration'=>$this->duration,
//                'progrss'=> $this->progress,
//                'parent'=> $this->parent,
//                ],
            "links" => $links->all(),
        ]);
    }}
