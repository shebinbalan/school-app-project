<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // app/Models/Student.php
public function user()
{
    return $this->belongsTo(User::class);
}

public function courses()
{
    return $this->belongsToMany(Course::class);
}

public function course()
{
    return $this->belongsTo(Course::class);
}

public function grades()
{
    return $this->hasMany(Grade::class);
}

public function attendance()
{
    return $this->hasMany(Attendance::class);
}

public function fees()
{
    return $this->hasMany(Fee::class);
}

public function marks()
{
    return $this->hasMany(Mark::class, 'student_id', 'id');
}

public function class()
{
    return $this->belongsTo(ClassDiv::class, 'class_id');
}

}
