<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    //

    public function subjects()
    {
        return $this->belongsTo(Subject::class);
    }
}
