<?php

namespace App\Http\Controllers\Admin;

use App\Models\Detail;
use App\Models\Tender;
use App\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\TenderRequest as StoreRequest;
use App\Http\Requests\TenderRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

/**
 * Class TenderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class TenderCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Tender');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/tender');
        $this->crud->setEntityNameStrings('tender', 'tenders');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        $this->crud->addButtonFromView('line','add_detail','add_detail','beginning');
        // TODO: remove setFromDb() and manually define Fields and Columns
//        $this->crud->setFromDb();
        $this->crud->setColumns(['name', 'brief', 'deadline', 'applicationFee',
            'status']);
        $this->crud->addField([
            'name'=>'user_id',
            'type'=>'hidden',
            'default'=> backpack_user()->id,
        ]);
        $this->crud->addField([
            'name' => 'name',
            'type' => 'text',
            'label' => 'Tender Title',
        ]);
        $this->crud->addField([
            'name' => 'brief',
            'type' => 'textarea',
            'label' => 'Brief Description of Tender'
        ]);
        $this->crud->addField([
            // DateTime
            'name' => 'deadline',
            'label' => 'Deadline Date and Time',
            'type' => 'datetime_picker',
            // optional:
            'datetime_picker_options' => [
                'format' => 'DD/MM/YYYY HH:mm',
                'language' => 'en',
                //'todayBtn' =>  'linked',
//                'startDate' => Carbon::tomorrow(),
            ],
            'allows_null' => true,
            'default' => Carbon::tomorrow(),
        ]);
        $this->crud->addField([
           'name'=>'applicationFee',
            'label'=> 'Application Fee',
            'type' => 'number',
             //optionals
//             'attributes' => ["step" => "any"], // allow decimals
             'prefix' => "Kshs",
             'suffix' => ".00",
            'value'=> 0,
        ]);
        $this->crud->addField([
            'name' => 'status',
            'label' => "Status",
            'type' => 'select2_from_array',
            'options' => [0 => 'Draft', 1 => 'Publish'],
            'allows_null' => false,
            'default' => 0,
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        $this->crud->addField([
            'name'=>'filename',
            'label'=>'Tender Documents',
            'type'=>'browse_multiple',
            // 'multiple' => true, // enable/disable the multiple selection functionality
             'mime_types' => ['application/pdf'], // visible mime prefixes; ex. ['image'] or ['application/pdf']
        ]);
        $this->crud->addField([
        'name' => 'requiredDocs',
        'label' => 'Specify Required Documents (Maximum of 5 Documents allowed)',
        'type' => 'table',
        'entity_singular' => 'option', // used on the "Add X" button
        'columns' => [
            'docName' => 'Document Name',
            'desc' => 'Description of document',
        ],
        'max' => 5, // maximum rows allowed in the table
        'min' => 1, // minimum rows allowed in the table
        'tab' => 'Files',
            ]);

        $this->crud->addField([
            // Select2Multiple = n-n relationship (with pivot table)
            'label' => "Select Partners",
            'type' => 'select2_multiple',
            'name' => 'user', // the method that defines the relationship in your Model
            'entity' => 'user', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\BackpackUser", // foreign key model
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
            // 'select_all' => true, // show Select All and Clear buttons?
            'tab' => 'Partners',
            // optional
            'options'   => (function ($query) {
                return $query->role('Super Administrator')->get();
            }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
        ]);


        // add asterisk for fields that are required in TenderRequest
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

    public function partner(){
//        return $this->crud->setListView('vendor.backpack.partner.partnerList');
//        return view('vendor.backpack.add_partner');
        return view($this->crud->setListView('vendor.backpack.partner.partnerList'));
    }
}
