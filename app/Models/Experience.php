<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'description',
        'responsibilities',
        'start_date',
        'end_date',
        'is_current',
        'type',
        'sort_order',
    ];

    protected $casts = [
        'responsibilities' => 'array',
        'start_date' => 'date',
        'end_date' => 'date',
        'is_current' => 'boolean',
    ];

    public function getResponsibilitiesAttribute($value): array
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
}
