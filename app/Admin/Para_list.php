<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Para_list extends Model
{
    public function subject()
    {
        return $this->belongsTo('App\Admin\Subject');
    }
}

