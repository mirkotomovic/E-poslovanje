<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name'];
    //
    public function journey() {
        return $this->hasMany('App\Journey');
    }
}
