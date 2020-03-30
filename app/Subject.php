<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function subject_detail()
    {
        return $this->hasMany(SubjectDetail::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function grade_detail()
    {
        return $this->belongsTo(GradeDetail::class);
    }
}
