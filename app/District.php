<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function places(){
        return $this->hasMany(Place::class);
    }
}
