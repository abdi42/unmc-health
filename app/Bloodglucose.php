<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bloodglucose extends Model
{
    //
    public function subjects()
    {
        return $this->belongsTo(Subject::class);
    }
}
