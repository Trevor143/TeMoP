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
    private $tender;
    public  function  __construct(Request $request)
    {
        $this->tender = $request->route('tender_id');
    }

//    public $id = $this->tender;

    public function show()
    {
//        dd($this->tender);
        $tender = Tender::find($this->tender);
//        dd($tender);
//        $people = \App\Models\BackpackUser::all('id','name')->map(function ($items){
//            $data['id'] = $items->id;
//            $data['text'] = $items->name;
//            return $data;
//        });

        $people = $tender->user->map(function ($items){
            $data['id'] = $items->id;
            $data['text'] = $items->name;
            return $data;
        });
//        dd($tender->tasks);

        return view('vendor.backpack.timelines.gantt', compact('people', 'tender'));
    }

    public function get($id){
//        dd($id);

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
