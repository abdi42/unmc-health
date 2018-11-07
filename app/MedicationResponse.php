<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicationResponse extends Model
{
    public function medication()
    {
        return $this->belongsTo(Medicationname::class);
    }
}
