<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function faculty()
    {
        return $this->belongsTo('App\Admin\Faculty');
    }
    public function enrollstudent()
    {
        return $this->hasMany('App\Admin\Enroll_student');
    }
}
