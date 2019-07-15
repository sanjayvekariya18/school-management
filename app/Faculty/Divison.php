<?php

namespace App\Faculty;

use Illuminate\Database\Eloquent\Model;

class Divison extends Model
{
    public function semester()
    {
        return $this->belongsTo('App\Faculty\Semester');
    }
    public function facultysubject()
    {
        return $this->hasMany('App\Faculty\Faculty_subject');
    }
    public function enrollstudent()
    {
        return $this->hasMany('App\Faculty\Enroll_student');
    }
}
