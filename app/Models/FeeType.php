<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeType extends Model
{
    public function fee() {
        return $this->belongsTo(Fee::class, 'fee_type_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
