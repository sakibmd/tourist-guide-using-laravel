<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Placetype extends Model
{
    public function places(){
        return $this->hasMany(Place::class);
    }
}
