<?php

namespace App\Faculty;

use Illuminate\Database\Eloquent\Model;

class Enroll_student extends Model
{
    public function student()
    {
        return $this->belongsTo('App\Faculty\Student');
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
}
