<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

use App\Http\Controllers\Admin\BidController;
use App\Models\Bid;
use App\Models\Company;
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
    Route::get('bids/tender/{tender_id}/inviteAll', 'BidController@inviteAll')->name('inviteAll');

//    Route::get('tender/{tender_id}/timeline', 'GanttController@gantt')->name('timeline');

    Route::get('tender/{tender_id}/timeline', 'GanttController@show')->name('timeline');
    Route::get('tender/timeline/task/{task}', 'TaskController@show')->name('task_detail');

    Route::get('tender/{tender_id}/close', 'TenderCrudController@close')->name('close');
    Route::get('tender/{tender_id}/open', 'TenderCrudController@open')->name('open');

    Route::get('tender/timeline/task/{task}/complete', 'TaskController@complete')->name('complete');
    Route::get('tender/timeline/task/{task}/uncomplete', 'TaskController@uncomplete')->name('uncomplete');

    Route::get('test/{id}', function ($id){
        $tender = Tender::find($id)->company->first()->user;

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


