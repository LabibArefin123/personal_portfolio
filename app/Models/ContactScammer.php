<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactScammer extends Model
{
    use HasFactory;

    protected $table = 'contact_scammers';

    protected $fillable = [
        'ip_address',
        'email',
        'phone',
        'reason',
        'user_agent',
        'message_hash',
        'hits',
        'blocked_until',
        'is_permanent',
    ];

    protected $casts = [
        'blocked_until' => 'datetime',
        'is_permanent'  => 'boolean',
        'hits'          => 'integer',
    ];

    public function isBlocked(): bool
    {
        return $this->is_permanent ||
            ($this->blocked_until && $this->blocked_until->isFuture());
    }
}
