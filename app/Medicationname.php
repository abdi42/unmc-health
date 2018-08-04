<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicationname extends Model
{
    public function medicationslot()
    {
       return $this->belongsTo(Medicationslot::class);
    }
}
