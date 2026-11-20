<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $fillable = [
        'name',
        'role',
        'image',
        'bio',
        'skills',
        'experiences',
        'highlights',
    ];

    protected function casts(): array
    {
        return [
            'bio' => 'array',
            'skills' => 'array',
            'experiences' => 'array',
            'highlights' => 'array',
        ];
    }
}
