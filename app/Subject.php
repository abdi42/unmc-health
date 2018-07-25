<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    public function weights()
    {
        return $this->hasMany(Weight::class);
    }

    public function bps()
    {
        return $this->hasMany(bloodpressure::class);
    }

    public function bgs()
    {
        return $this->hasMany(bloodglucose::class);
    }

    public function pulseoxes()
    {
        return $this->hasMany(Pulseoxygen::class);
    }

}
