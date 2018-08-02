<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollsubject extends Model
{
    public function subject()
    {
        return $this->belongsTo(Subject::class,'userid','userid');
    }
}
