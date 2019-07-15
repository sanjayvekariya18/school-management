<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Tof_question extends Model
{
    public function subject()
    {
        return $this->belongsTo('App\Admin\Subject');
    }
}
