<?php

namespace App\Faculty;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public function stream()
    {
        return $this->belongsTo('App\Faculty\Stream');
    }
    public function facultysubject()
    {
        return $this->hasMany('App\Faculty\Faculty_subject');
    }
    public function student()
    {
        return $this->hasMany('App\Faculty\Student');
    }
    public function test()
    {
        return $this->hasMany('App\Faculty\Test');
    }
}
