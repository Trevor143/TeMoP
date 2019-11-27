<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

use App\Http\Controllers\Admin\BidController;
use App\Models\Bid;
use App\Models\Detail;
use App\Models\Tender;
use App\Models\Timeline;
use Illuminate\Support\Facades\Auth;


Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::get('dashboard', 'DashboardController@dashboard');
    CRUD::resource('tender', 'TenderCrudController');
    CRUD::resource('detail','DetailCrudController');

    Route::get('bids/bidsfor-{tender_id}', 'BidController@bids')->name('bids.bids');
    Route::resource('bids', 'BidController');
//    CRUD::resource('user', 'UserCrudController');

    Route::get('/bids/{bid_id}/award', 'TenderCrudController@award')->name('award');

//    Route::get('tender/{tender_id}/timeline', 'GanttController@gantt')->name('timeline');

    Route::get('tender/{tender_id}/timeline', 'GanttController@show'
//        function ($id){
//        $tender = Tender::find($id);
//
////        $people = \App\Models\BackpackUser::all('id','name')->map(function ($items){
////            $data['id'] = $items->id;
////            $data['text'] = $items->name;
////            return $data;
////        });
//
//        $people = $tender->user->map(function ($items){
//            $data['id'] = $items->id;
//            $data['text'] = $items->name;
//            return $data;
//        });
////        dd($tender->tasks);
//
//        return view('vendor.backpack.timelines.gantt', compact('people', 'tender'));
//    }
    );

    Route::get('tender/timeline/task/{task}', 'TaskController@show')->name('task_detail');

        Route::get('test/{id}', function ($id){
        $tender = Tender::find($id)->bids;
//        $bid = Bid::where('tender_id', $id)->get();
//        $bid = $tender->bids ;
        dd($tender);
    });

    Route::get('try',function (){
        $with = Tender::with('detail')->has('detail')->pluck('id')->toArray();
        $tender = Tender::all()->except($with)->pluck('id')->toArray();
        $new = Tender::where(function($query) use ($tender)
        {
            $query->whereIn('id', $tender);
        })->toArray();
        return $new;
    });

    Route::get('/find', 'DetailCrudController@find');
    Route::get('/find/{id}', 'DetailCrudController@show');

//    Route::get('f')

    //    Route::get('/tender_partner', 'TenderCrudController@partner');
//    Route::get('admin/tender', 'PartnerCrudController@create')->name('part');
    CRUD::resource('timeline', 'TimelineCrudController');
}); // this should be the absolute last line of this file


