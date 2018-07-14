<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Educationalcontent extends Model
{
    //

    public function educationalcontentcategories()
    {
        return $this->hasMany(Educationalcontentcategory::class);
    }
}
