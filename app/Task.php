<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $appends = ["open"];
    protected $fillable = ['text', 'start_date','duration','progress', 'parent'];
    protected $dates = ['start_date'];

    public function getOpenAttribute(){
        return true;
    }

    public function tender()
    {
        return $this->belongsTo('App\Models\Tender');
    }
}
