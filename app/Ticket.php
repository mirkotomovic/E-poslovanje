<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    public function journey(){
        return $this->belongsTo('App\Journey');
    }
}
