<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GradeDetail extends Model
{
    public function grade(){
        return $this->belongsTo(Grade::class);
    }
}
