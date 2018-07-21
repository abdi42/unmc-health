<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pulseoxygen extends Model
{
    //
    public function muser()
    {
        return $this->belongsTo(Muser::class);
    }
}
