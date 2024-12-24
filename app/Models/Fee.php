<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{

    protected $fillable = [
        'name', 
    
    ];
    
    public function feeTypes()
    {
        return $this->hasMany(FeeType::class);
    }
}
