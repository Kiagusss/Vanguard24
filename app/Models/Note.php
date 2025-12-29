<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'name',
        'note'
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
