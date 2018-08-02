<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actionplan extends Model
{
    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject','subject');
    }
}
