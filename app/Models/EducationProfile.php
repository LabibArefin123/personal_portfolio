<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationProfile extends Model
{
    protected $table = 'education_profiles';

    protected $fillable = [
        'title',
        'subtitle',
        'intro_title',
        'intro_description',
        'highlight_value',
        'highlight_label',
        'github_username',
        'github_url',
        'github_chart_url',
        'github_title',
        'github_description',
        'github_activities',
        'focus_cards',
        'is_active',
    ];

    protected $casts = [
        'github_activities' => 'array',
        'focus_cards' => 'array',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
