<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Enroll_student extends Model
{
    public function student()
    {
        return $this->belongsTo('App\Admin\Student');
    }
    public function stream()
    {
        return $this->belongsTo('App\Admin\Stream');
    }
    public function semester()
    {
        return $this->belongsTo('App\Admin\Semester');
    }
    public function divison()
    {
        return $this->belongsTo('App\Admin\Divison');
    }
}
