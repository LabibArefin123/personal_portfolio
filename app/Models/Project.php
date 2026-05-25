<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'tech_stack',
        'image',
        'live_url',
        'github_url',
        'is_highlight',
        'status',
        
    ];

    protected $casts = [
        'is_highlight' => 'boolean',
        'status' => 'boolean',
    ];

    public function information()
    {
        return $this->hasOne(ProjectInformation::class);
    }
}