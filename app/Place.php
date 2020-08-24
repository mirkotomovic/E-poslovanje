<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['name'];
    //
    public function paths()
    {
        return $this->belongsToMany(Path::class)->withPivot(['ordinal']);
    }
}
