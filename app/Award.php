<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    public function bidder()
    {
        return $this->belongsTo('');
    }
}
