<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'blog_id',
        'parent_id',
        'name',
        'email',
        'url',
        'message',
    ];

    
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->with('replies');
    }

   
    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}
