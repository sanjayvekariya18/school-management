<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    public function stream()
    {
        return $this->belongsTo('App\Admin\Stream');
    }
    public function facultysubject()
    {
        return $this->hasMany('App\Admin\Faculty_subject');
    }
    public function student()
    {
        return $this->hasMany('App\Admin\Student');
    }
    public function test()
    {
        return $this->hasMany('App\Admin\Test');
    }
}
