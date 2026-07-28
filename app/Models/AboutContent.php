<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'bio',
        'profile_image',
        'projects_count',
        'experience_years',
        'expertise_level',
        'development_type',
    ];
}
