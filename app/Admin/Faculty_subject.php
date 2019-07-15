<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Faculty_subject extends Model
{
    public function faculty()
    {
        return $this->belongsTo('App\Admin\Faculty');
    }
    public function stream()
    {
        return $this->belongsTo('App\Admin\Stream');
    }
    public function semester()
    {
        return $this->belongsTo('App\Admin\Semester');
    }
    public function divison()
    {
        return $this->belongsTo('App\Admin\Divison');
    }
    public function subject()
    {
        return $this->belongsTo('App\Admin\Subject');
    }
}
