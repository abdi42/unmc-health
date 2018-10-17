<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicationslot extends Model
{
    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject','subject');
    }

    public function medicines()
    {
        return $this->hasMany(Medicationname::class);
    }

    public function setMedicationDayAttribute($days){
        $daysKeys =["sunday","monday","tuesday","wednesday","thursday","friday","saturday"];

        foreach($daysKeys as $day) {
            $this->attributes[$day] = array_key_exists($day,$days);
        }

        $this->attributes['medication_day'] = implode(",",$days);
    }
}
