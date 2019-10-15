<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

use App\Models\Detail;
use App\Models\Tender;
use App\Models\Timeline;


Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::get('dashboard', 'DashboardController@dashboard');
    CRUD::resource('tender', 'TenderCrudController');
    CRUD::resource('detail','DetailCrudController');

//    CRUD::resource('user', 'UserCrudController');

    Route::get('test/{id}', function ($id){
//        $tender = Tender::with('timeline')->get();
        $count = Timeline::where('tender_id',$id)->count();
        $all = Timeline::all();
//        $tender= Tender::findOrFail($id)->with('timeline')->with('detail')->get()->toArray();
        $tender = Timeline::where('tender_id',$id)->get()->toJson();
//        dd($tender);
//        return $tender;
        return view('vendor.backpack.timelines.table', compact('tender'));
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
