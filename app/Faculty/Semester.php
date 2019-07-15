<?php

namespace App\Faculty;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    public function stream()
    {
        return $this->belongsTo('App\Faculty\Stream');
    }
    public function divison()
    {
        return $this->hasMany('App\Faculty\Divison');
    }
    public function subject()
    {
        return $this->hasMany('App\Faculty\Subject');
    }
    public function facultysubject()
    {
        return $this->hasMany('App\Faculty\Faculty_subject');
    }
    public function test()
    {
        return $this->hasMany('App\Faculty\Test');
    }
    public function enrollstudent()
    {
        return $this->hasMany('App\Faculty\Enroll_student');
    }
}
