<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    // app/Models/Teacher.php
public function user()
{
    return $this->belongsTo(User::class);
}

public function courses()
{
    return $this->hasMany(Course::class);
}

public function timetables()
{
    return $this->hasMany(Timetable::class);
}

}
