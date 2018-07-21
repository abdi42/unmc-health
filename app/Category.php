<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // $educationalcontentcategory->educationalcontent;

    public function content()
    {
        return $this->hasMany(Content::class);
    }

}
