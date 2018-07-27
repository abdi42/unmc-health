<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    public function weights()
    {
        return $this->hasMany(Weight::class);
    }

    public function bloodpressures()
    {
        return $this->hasMany(Bloodpressure::class);
    }

    public function bloodglucoses()
    {
        return $this->hasMany(Bloodglucose::class);
    }

    public function pulseoxygens()
    {
        return $this->hasMany(Pulseoxygen::class);
    }

}
