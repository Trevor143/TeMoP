<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Tender extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'tenders';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
//    protected $fillable = [];
    protected $fillable=[
        'user_id','name','brief','deadline','applicationFee','status', 'filename', 'requiredDocs'
    ];
    // protected $hidden = [];
     protected $dates = ['deadline', 'created_at'];
    protected $casts=[
        'filename'=> 'array',
        'requiredDocs'=>'object',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function noDetail(){
//        $with = Tender::with('detail')->has('detail')->get();
//
//        Tender::all()->except($with);

    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    //Applies to Partner Users
    public function user(){
        return $this->belongsToMany('App\Models\BackpackUser','tender_user');
    }

    public function detail(){
        return $this->hasOne('App\Models\Detail');
    }

    public function timeline(){
        return $this->hasMany('App\Models\Timeline', 'tender_id');
    }

    public function bids(){
        return $this->hasMany('App\Models\Bid');
    }

    public function company()
    {
        return $this->belongsToMany('App\Models\Company', 'company_tender');
    }

    public function tasks(){
        return $this->hasMany('App\Task');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
