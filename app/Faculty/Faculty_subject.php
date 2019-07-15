<?php

namespace App\Faculty;

use Illuminate\Database\Eloquent\Model;

class Faculty_subject extends Model
{
    public function faculty()
    {
        return $this->belongsTo('App\Faculty\Faculty');
    }
    public function stream()
    {
        return $this->belongsTo('App\Faculty\Stream');
    }
    public function semester()
    {
        return $this->belongsTo('App\Faculty\Semester');
    }
    public function divison()
    {
        return $this->belongsTo('App\Faculty\Divison');
    }
    public function subject()
    {
        return $this->belongsTo('App\Faculty\Subject');
    }
}
