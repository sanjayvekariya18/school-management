<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    public function semester()
    {
        return $this->hasMany('App\Admin\Semester');
    }
    public function faculty()
    {
        return $this->hasMany('App\Admin\Faculty');
    }
    public function facultysubject()
    {
        return $this->hasMany('App\Admin\Faculty_subject');
    }
    public function enrollstudent()
    {
        return $this->hasMany('App\Admin\Enroll_student');
    }
}
