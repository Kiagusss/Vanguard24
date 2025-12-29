<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @deprecated Messages feature removed. Use Note model instead.
 */
class Message extends Model
{
    protected $table = 'messages';

    protected $guarded = [];
}
