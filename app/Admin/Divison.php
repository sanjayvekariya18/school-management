<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Divison extends Model
{
    public function semester()
    {
        return $this->belongsTo('App\Admin\Semester');
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
