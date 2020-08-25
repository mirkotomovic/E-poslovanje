<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    //
    public function path()
    {
        return $this->belongsTo('App\Path');
    }

    public function company() {
        return $this->belongsTo('App\Company');
    }

    public function ticket(){
        return $this->hasMany('App\Ticket');
    }
}
