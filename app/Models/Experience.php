<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'job_title',
        'company',
        'location',
        'start_date',
        'end_date',
        'is_current',
        'duration_badge',
        'achievements',
        'icon_type',
        'gradient_from',
        'gradient_to',
        'accent_color',
        'order',
        'is_active',
    ];

    protected $casts = [
        'achievements' => 'array',
        'is_current' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
