<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    //
    public function route()
    {
        return $this->belongsTo('App\Path');
    }

    public function ticket(){
        return $this->hasMany('App\Ticket');
    }
}
