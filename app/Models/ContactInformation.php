<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'location',
        'linkedin_url',
        'github_url',
        'twitter_url',
    ];
}
