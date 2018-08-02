<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject','subject');
    }
}
