<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    //
    public function paths()
    {
        return $this->belongsToMany(Path::class)->withPivot(['ordinal']);
    }
}
