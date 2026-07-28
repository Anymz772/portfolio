<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'long_description',
        'image',
        'technologies',
        'features',
        'github_url',
        'live_url',
        'is_featured',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'technologies' => 'array',
        'features' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    private function parseJsonArray($value): array
    {
        if (is_null($value)) {
            return [];
        }
        if (is_array($value)) {
            return $value;
        }
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            if (is_array($decoded)) {
                return $decoded;
            }
            if (is_string($decoded)) {
                $secondDecode = json_decode($decoded, true);
                if (is_array($secondDecode)) {
                    return $secondDecode;
                }
            }

            return array_filter(array_map('trim', explode("\n", $value)));
        }

        return [];
    }

    public function getTechnologiesAttribute($value): array
    {
        return $this->parseJsonArray($value);
    }

    public function getFeaturesAttribute($value): array
    {
        return $this->parseJsonArray($value);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
