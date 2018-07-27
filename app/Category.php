<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    // $educationalcontentcategory->educationalcontent;


    public function contents()
    {
        return $this->hasMany(Content::class);
    }

}
