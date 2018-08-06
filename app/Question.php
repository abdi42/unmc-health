<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

   public function content()
   {
       return $this->belongsTo(Content::class);
   }

   public function answers()
    {

        return $this->hasMany(Answer::class);
    }

}
