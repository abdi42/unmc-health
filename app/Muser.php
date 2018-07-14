<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Muser extends Model
{
    //
    /*
    protected $fillable = [

        'userid','dateofbirth','gender','height','nickname','weight',
    ];
    */

    public function weights()
    {
        return $this->hasMany(Weight::class);
    }

    public function bps()
    {
        return $this->hasMany(bp::class);
    }

    public function bgs()
    {
        return $this->hasMany(bg::class);
    }

    public function pulseoxes()
    {
        return $this->hasMany(Pulseoxe::class);
    }
}
