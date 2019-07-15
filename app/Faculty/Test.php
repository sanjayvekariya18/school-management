<?php

namespace App\Faculty;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public function subject()
    {
        return $this->belongsTo('App\Admin\Subject');
    }
    public function semester()
    {
        return $this->belongsTo('App\Admin\Semester');
    }
    public function faculty()
    {
        return $this->belongsTo('App\Admin\Faculty');
    }
}
