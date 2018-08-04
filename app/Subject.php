<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $primaryKey='subject';
    public $incrementing = false;

    public function actionplans()
    {
        return $this->hasMany(Actionplan::class,'subject','subject');
    }

    public function goals()
    {
        return $this->hasMany(Goal::class,'subject','subject');
    }

    public function medicationslots()
    {
        return $this->hasMany(Medicationslot::class,'subject','subject');
    }


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

    public function enrollsubject()
    {
        return $this->hasOne(Enrollsubject::class,'userid','userid');
    }

}
