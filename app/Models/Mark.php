<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function classdiv()
    {
        return $this->belongsTo(ClassDiv::class);
    }

    public function class()
{
    return $this->belongsTo(ClassDiv::class, 'class_id');
}
}
