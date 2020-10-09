<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function tourist(){
        return $this->belongsTo(User::class, 'tourist_id');
    }

    public function guide(){
        return $this->belongsTo(Guide::class, 'guide_id');
    }

    public function package(){
        return $this->belongsTo(Package::class, 'package_id');
    }
}
