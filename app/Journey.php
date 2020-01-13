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

    public function tickets(){
        // hasOne for now, I am not sure if we want to change this to hasMany
        return $this->hasOne('App\Ticket');
    }
}
