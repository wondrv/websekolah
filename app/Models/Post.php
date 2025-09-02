<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Allow mass assignment for simple MVP
    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
