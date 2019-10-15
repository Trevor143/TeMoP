<?php

namespace App\Http\Controllers\Admin;

use App\Models\BackpackUser;
use App\Models\Tender;
use App\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\PartnerRequest as StoreRequest;
use App\Http\Requests\PartnerRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class PartnerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class PartnerCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Partner');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/partner');
        $this->crud->setEntityNameStrings('partner', 'partners');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
//        $this->crud->setFromDb();
//        $this->crud->addButtonFromView('line','create_partner','top','beginning');

        Tender::all();
        $this->crud->setColumns(['tender_id']);

        $this->crud->addField([
            'name' => 'tender_id',
//            'label' => 'Specify Required Documents (Maximum of 5 Documents allowed)',
            'type' => 'hidden',
            'value'=>'',
            'tab' => 'Partners',
        ]);

        $this->crud->addField([
            'name'=> 'user_id',
            'type'=> 'text',
            'label' => 'Select Partners',
//            'entity'=>'user',
//            'atrribute'=>'name',
//            'model'=>'App\Models\BackpackUser',
            'tab' => 'Partners'

        ]);

        // add asterisk for fields that are required in PartnerRequest
//        $this->crud->setRequiredFields();
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function create()
    {
//        Tender::all();
//
////        $users = BackpackUser::all();
//        $partners =  BackpackUser::role('Partner')->get();
//        $tenders = Tender::all();
//        return view('vendor.backpack.partner.create', compact('partners','tenders'));
////        return $tenders;

    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
//        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
//        return $redirect_location;


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
