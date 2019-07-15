<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Test_question extends Model
{
    public function test()
    {
        return $this->belongsTo('App\Admin\Test');
    }
}
