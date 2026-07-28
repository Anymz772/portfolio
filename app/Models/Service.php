<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'icon',
        'description',
        'features',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
    ];

    public function getFeaturesAttribute($value): array
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

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
