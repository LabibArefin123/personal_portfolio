<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorTrack extends Model
{
    protected $fillable = [
        'session_id',
        'user_id',
        'ip_address',
        'user_agent',
        'url',
        'last_activity'
    ];
}
