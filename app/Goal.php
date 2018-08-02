<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject','subject');
    }
}
