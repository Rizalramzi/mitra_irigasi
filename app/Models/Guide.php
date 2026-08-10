<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guide extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'subtitle',
        'category',
        'icon',
        'duration',
        'youtube_url',
        'tools_and_materials',
        'steps',
        'is_active',
    ];

    protected $casts = [
        'tools_and_materials' => 'array',
        'steps' => 'array',
        'is_active' => 'boolean',
    ];
}
