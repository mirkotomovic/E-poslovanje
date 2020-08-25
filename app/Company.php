<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    public function journey() {
        return $this->hasMany('App\Journey');
    }
}
