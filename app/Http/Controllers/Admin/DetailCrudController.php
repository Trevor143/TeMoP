<?php

namespace App\Http\Controllers\Admin;

use App\Models\Detail;
use App\Tender;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\DetailRequest as StoreRequest;
use App\Http\Requests\DetailRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class DetailCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class DetailCrudController extends CrudController
{
    public function setup()
    {
        $tender_id = \Route::current()->parameter('tender_id');
//        $tender = Tender::findOrFail($tender_id);
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        // Setters for Title
//        $this->crud->setTitle('Details for '. $tender->name, 'create');
//        $this->crud->setHeading('');
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Detail');
        $this->crud->setRoute(config('backpack.base.route_prefix') .'/detail');
        $this->crud->setEntityNameStrings('detail', 'details');

        $this->crud->setColumns(['tender_id']);
        /*
         * Fields to fill in
         * */
        if ($this->crud->actionIs('create')) {
            $this->crud->addField([  // Select2
                'label' => "Select a Tender",
                'type' => 'select2',
                'name' => 'tender_id', // the db column for the foreign key
                'entity' => 'tender', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model' => "App\Models\Tender", // foreign key model

                // optional
                'options' => (function ($query) {
                    $ids = Detail::all()->pluck('tender_id')->toArray();
                    return $query->whereNotIn('id', $ids)->get();
                }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
            ]);
        }else{
            $this->crud->addField([  // Select2
                'label' => "Select a Tender",
                'type' => 'select2',
                'name' => 'tender_id', // the db column for the foreign key
                'entity' => 'tender', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'model' => "App\Models\Tender", // foreign key model

                //optional
                'options'=> (function ($query) {
                    $tender_id = \Route::current()->parameter('tender_id');
                    $tender = Detail::findOrFail($this->crud->entry->id);
                    return $query->where('id', $tender->tender_id)->get();
                }),
            ]);
        }
        $this->crud->addField([
            'name' => 'timeline', // a unique name for this field
            'start_name' => 'start_date', // the db column that holds the start_date
            'end_name' => 'end_date', // the db column that holds the end_date
            'label' => 'Tender Date Range',
            'type' => 'date_range',
            'entity_singular' => 'option',
            // OPTIONALS
            'start_default' =>now(), // default value for start_date
            'end_default' => Carbon::tomorrow(), // default value for end_date
            'date_range_options' => [ // options sent to daterangepicker.js
                'timePicker' => false,
                'locale' => ['format' => 'DD/MM/YYYY HH:mm']
            ]
        ]);

        $this->crud->addField([
            'name'=>'minutes',
            'label'=>'Tender Documents',
            'type'=>'browse_multiple',
            // 'multiple' => true, // enable/disable the multiple selection functionality
            'mime_types' => ['application/pdf'], // visible mime prefixes; ex. ['image'] or ['application/pdf']
        ]);
        //      Trial ends here
        // add asterisk for fields that are required in DetailRequest
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
    /**
     * Get the mode of CRUD (edit, add, view, index, etc.)
     *
     * @return void|string
     */
    public function getMode()
    {
        $path = \Route::currentRouteName();
        $entity = strtolower($this->crud->entity_name);
        if (preg_match('/^crud\.'.$entity.'\.(.+?)$/', $path, $out)) {
            return $out[1];
        }
        return null;
    }

    public function show($id){
        $detail = Detail::find($id);

        $count = $detail->range_dates;
//        for ($i =0; $i=$count; $i++)
//        {
//            $range =
////                Carbon::parse($detail->range_dates[$i]->start_date);
////                Carbon::createFromFormat('dd/mm/yyyy', $detail->range_dates[$i]->start_date, 'null');
//                date('Y-m-d h:i:s', strtotime($detail->range_dates[$i]->start_date));
//            dd($range);
//        }

//        dd($detail->range_dates);

//        $diff = $detail->range_dates
        $dates  = array();
        Detail::all()->map(function($item) use(&$dates) {
            $dates->range_dates[$item->id] = $item->toArray();
        });
        dd($dates);
//        dd(date('Y-m-d h:i:s', strtotime($detail->range_dates[0]->start_date)));
//        dd(count());
//        foreach ($detail->range_dates as $dates)
//        dd(json_encode($dates));

        return $detail;
    }

}
