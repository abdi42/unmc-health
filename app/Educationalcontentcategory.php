<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Educationalcontentcategory extends Model
{
    // $educationalcontentcategory->educationalcontent;

    public function educationalcontent()
    {
        return $this->belongsTo(Educationalcontent::class);
    }
}
