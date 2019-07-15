<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public function subject()
    {
        return $this->belongsTo('App\Admin\Subject');
    }
    public function semester()
    {
        return $this->belongsTo('App\Admin\Semester');
    }
    public function faculty()
    {
        return $this->belongsTo('App\Admin\Faculty');
    }
    public function testquestion()
    {
        return $this->hasMany('App\Admin\Test_question');
    }
}
