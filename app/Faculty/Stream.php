<?php

namespace App\Faculty;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    public function semester()
    {
        return $this->hasMany('App\Faculty\Semester');
    }
    public function faculty()
    {
        return $this->hasMany('App\Faculty\Faculty');
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
