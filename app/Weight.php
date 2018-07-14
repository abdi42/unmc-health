<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    //

    public function muser()
    {
        return $this->belongsTo(Muser::class);
    }
}
