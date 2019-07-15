<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function subject()
    {
        return $this->belongsTo('App\Admin\Subject');
    }
}
