<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Detail extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'details';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['tender_id','start_date','end_date', 'range_dates','important_dates','minutes'];
    // protected $hidden = [];
    // protected $dates = [];
    protected $casts = [
        'range_dates'=> 'object',
        'minutes'=>'array'
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function noDetail(){
        $with = Tender::with('detail')->has('detail')->pluck('id')->toArray();
        $tender = Tender::all()->except($with);
        return $tender;
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function tender(){

        return $this->belongsTo('App\Models\Tender');
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
    public function setDatetimeAttribute($value) {
        $this->attributes['date_picker'] = \Carbon\Carbon::parse($value);
    }
}
