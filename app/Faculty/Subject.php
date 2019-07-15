<?php

namespace App\Faculty;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function semester()
    {
        return $this->belongsTo('App\Faculty\Semester');
    }
    public function facultysubject()
    {
        return $this->hasMany('App\Faculty\Faculty_subject');
    }
    public function test()
    {
        return $this->hasMany('App\Faculty\Test');
    }
    public function mcqquestion()
    {
        return $this->hasMany('App\Admin\Mcq_question');
    }
    public function tofquestion()
    {
        return $this->hasMany('App\Admin\Tof_question');
    }
    public function paralist()
    {
        return $this->hasMany('App\Admin\Para_list');
    }
    public function schedule()
    {
        return $this->hasMany('App\Admin\Schedule');
    }
}
