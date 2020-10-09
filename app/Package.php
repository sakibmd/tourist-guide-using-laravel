<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function places(){
        return $this->belongsToMany(Place::class);
    }

    public function user(){
        $this->belongsTo(User::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
