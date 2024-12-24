<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    public function poster()
    {
        return $this->belongsTo(User::class, 'posted_by');
    }
}
