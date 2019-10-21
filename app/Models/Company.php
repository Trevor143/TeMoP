<?php

namespace App\Models;

use App\Models\Bidder;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function bids(){
        return $this->hasManyThrough(\App\Models\Bid::class,Bidder::class);
    }

    public function tender()
    {
        return $this->hasMany('App\Models\Tender');
    }

}
