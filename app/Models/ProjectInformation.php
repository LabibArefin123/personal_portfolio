<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectInformation extends Model
{
    protected $table = 'project_informations';

    protected $fillable = [

        'project_id',
        'overview',
        'project_images',
        'custom_features',
        'project_languages',
        'challenges',
        'solution',
        'conclusion',
        'project_link',
        'github_link',
        'status',
    ];

    protected $casts = [

        'project_images' => 'array',
        'custom_features' => 'array',
        'project_languages' => 'array',
        'status' => 'boolean',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
