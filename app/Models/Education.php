<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{

    protected $table = 'educations';

    protected $fillable = [
        'year',
        'degree',
        'institution',
        'result',
        'status',
        'timeline_description',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'year' => 'integer',
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')
            ->orderByDesc('year');
    }
}
