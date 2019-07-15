<?php

namespace App\Faculty;

use Illuminate\Database\Eloquent\Model;

class Mcq_question extends Model
{
    public function subject()
    {
        return $this->belongsTo('App\Faculty\Subject');
    }
}
