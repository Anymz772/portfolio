<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_line1',
        'title_line2',
        'title_line3',
        'description',
        'typing_texts',
        'profile_image',
    ];

    protected $casts = [
        'typing_texts' => 'array',
    ];

    public function getTypingTextsAttribute($value): array
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
