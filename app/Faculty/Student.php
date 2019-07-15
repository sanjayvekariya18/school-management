<?php

namespace App\Faculty;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function faculty()
    {
        return $this->belongsTo('App\Faculty\Faculty');
    }
    public function enrollstudent()
    {
        return $this->hasMany('App\Faculty\Enroll_student');
    }
}
