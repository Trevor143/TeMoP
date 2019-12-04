<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Link;
use App\Models\BackpackUser;
use App\Models\Tender;
use App\Task;
use Illuminate\Http\Request;

class GanttController extends Controller
{
    public function show($id)
    {
        $tender = Tender::find($id);

        $project = $tender->tasks->where('type', 'project')->pluck('id')->toArray();
        $count = $tender->tasks->where('complete', true)
            ->where('complete_confirm', true)->except($project)->count();
        $tasks = $tender->tasks->except($project)->count();

        $people = $tender->user->map(function ($items){
            $data['id'] = $items->id;
            $data['text'] = $items->name;
            return $data;
        });

        return view('vendor.backpack.timelines.gantt', compact('people', 'tender', 'count', 'tasks'));
    }

    public function get($id){
        $tender = Tender::find($id);
//        $tasks = Task::where('tender_id', $id)->get();
        $tasks = new Task();
        $links = new Link();
        $people = new BackpackUser();

        return response()->json([
            "data" => $tender->tasks,
            "links" => $links->all(),
            "people" => $people->all('id','name')->map(function ($items){
                $data['id'] = $items->id;
                $data['text'] = $items->name;
                return $data;
            }),
//            "data" => $tasks->where('tender_id', $id)->get(),
        ]);
    }

    public function gantt($id){
        $tender = Tender::find($id);
        $people = BackpackUser::all('id','name')->map(function ($items){
            $data['id'] = $items->id;
            $data['text'] = $items->name;
            return $data;
        });

        return view('vendor.backpack.timelines.gantt', compact('tender', 'people'));
    }


}
