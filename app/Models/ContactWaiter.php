<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactWaiter extends Model
{
    use HasFactory;

    protected $table = 'contact_waiters';

    protected $fillable = [
        'ip_address',
        'attempts',
        'last_attempt_at',
        'last_submission_at',
        'blocked_until',
    ];

    protected $casts = [
        'attempts'            => 'integer',
        'last_attempt_at'     => 'datetime',
        'last_submission_at'  => 'datetime',
        'blocked_until'       => 'datetime',
    ];

    public function isWaiting(): bool
    {
        return $this->blocked_until &&
            $this->blocked_until->isFuture();
    }
}
