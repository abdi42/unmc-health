<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicationslot extends Model
{
    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject','subject');
    }

    public function medicationnames()
    {
        return $this->hasMany(Medicationname::class);
    }
}
