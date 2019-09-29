<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('tender', 'TenderCrudController')
        ->with(function (){
            Route::get('tender/partner', 'TenderCrudController@partner');
        CRUD::resource('partner', 'PartnerCrudController');

    });

//    Route::get('/tender_partner', 'TenderCrudController@partner');
//    Route::get('partner/create', 'PartnerCrudController@create')->name('part');
}); // this should be the absolute last line of this file
