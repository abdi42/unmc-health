<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bloodglucose extends Model
{
    //
    public function muser()
    {
        return $this->belongsTo(Muser::class);
    }
}
