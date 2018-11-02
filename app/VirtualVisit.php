<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class VirtualVisit extends Model
{
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject', 'subject');
    }

    public function getDateOnlyAttribute()
    {
        $dt = Carbon::parse($this->date)->format('Y-m-d');
        return $dt;
    }

    public function getTimeAttribute()
    {
        $dt = Carbon::parse($this->date)->format('h:i:s');
        return $dt;
    }
}
