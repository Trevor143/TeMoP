<?php

namespace App\Http\Controllers\Admin;

use App\Models\BackpackUser;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\TimelineRequest as StoreRequest;
use App\Http\Requests\TimelineRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use Carbon\Carbon;

/**
 * Class TimelineCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class TimelineCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Timeline');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/timeline');
        $this->crud->setEntityNameStrings('timeline', 'timelines');
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
//        $this->crud->setCreateView('vendor.backpack.timelines.create');

        // TODO: remove setFromDb() and manually define Fields and Columns
//        Table
        $this->crud->setColumns(['tender_id','task_name', 'start_date','end_date']);

        $this->crud->addField([
            'label' => "Select Tender",
            'type' => 'select2',
            'name' => 'tender_id', // the db column for the foreign key
            'entity' => 'tender', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Tender", // foreign key model

            // optional
//            'default' => 2, // set the default value of the select2
//            'options'   => (function ($query) {
//                return $query->orderBy('name', 'ASC')->get();
//            }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
        ]);
        $this->crud->addField(
            [
                'name'=>'task_name',
                'label'=> 'Task',
                'type'=>'text',
            ]
        );
        $this->crud->addField([
            'name' => 'task_date_range', // a unique name for this field
            'start_name' => 'start_date', // the db column that holds the start_date
            'end_name' => 'end_date', // the db column that holds the end_date
            'label' => 'Task Date Range',
            'type' => 'date_range',
            // OPTIONALS
            'start_default' => Carbon::now(), // default value for start_date
            'end_default' => Carbon::tomorrow(), // default value for end_date
            'date_range_options' => [ // options sent to daterangepicker.js
                'timePicker' => false,
                'locale' => ['format' => 'DD/MM/YYYY']
            ]
        ]);
        $this->crud->addField([
            'name' => 'user_id',
            'label' => 'Person(s) responsible',
            'type' => 'select_and_order',
            'options' => BackpackUser::get()->pluck('name','id')->toArray(),

        ]);


        // add asterisk for fields that are required in TimelineRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
