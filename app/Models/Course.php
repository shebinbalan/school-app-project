<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function teacher()
{
    return $this->belongsTo(Teacher::class, 'teacher_id');
}

public function students()
{
    return $this->belongsToMany(Student::class);
}

public function assignments()
{
    return $this->hasMany(Assignment::class);
}

public function timetable()
{
    return $this->hasMany(Timetable::class);
}

public function grades()
{
    return $this->hasMany(Grade::class);
}

public function attendance()
{
    return $this->hasMany(Attendance::class);
}
}
