<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicationname extends Model
{
    protected $touches = ['medicationslot'];
    public function medicationslot()
    {
        return $this->belongsTo(Medicationslot::class);
    }

    public function responses()
    {
        return $this->hasMany(MedicationResponse::class);
    }
}
