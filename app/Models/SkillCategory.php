<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillCategory extends Model
{
    protected $fillable = [
        'name',
        'icon',
        'grid_cols',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'grid_cols' => 'integer',
        'order' => 'integer',
    ];

    public function skills()
    {
        return $this->hasMany(Skill::class)->orderBy('order');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }
}
