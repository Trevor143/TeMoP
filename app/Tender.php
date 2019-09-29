<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
//    protected $guarded=[];
    protected $fillable=[
        'user_id','name','brief','deadline','applicationFee','status',
    ];
    public function setDatetimeAttribute($value) {
        $this->attributes['datetime'] = \Carbon\Carbon::parse($value);
    }
}
