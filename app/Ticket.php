<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    
    protected $fillable = ['journey_id', 'user_id'];

    public function journey(){
        return $this->belongsTo('App\Journey');
    }
}
