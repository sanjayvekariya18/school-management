<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    public function stream()
    {
        return $this->belongsTo('App\Admin\Stream');
    }
    public function divison()
    {
        return $this->hasMany('App\Admin\Divison');
    }
    public function subject()
    {
        return $this->hasMany('App\Admin\Subject');
    }
    public function facultysubject()
    {
        return $this->hasMany('App\Admin\Faculty_subject');
    }
    public function test()
    {
        return $this->hasMany('App\Admin\Test');
    }
    public function enrollstudent()
    {
        return $this->hasMany('App\Admin\Enroll_student');
    }
}
