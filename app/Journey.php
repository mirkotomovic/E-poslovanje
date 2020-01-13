<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    //
    public function route()
    {
        return $this->belongsTo('App\Route');
    }

    public function ticket(){
        return $this->hasOne('App\Ticket');
    }
}
