<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'activity_level',
        'budget',
        'rating',
        'time_frame',
        'address',
        'description',
    ];

    // Accessor to get the full URL for the image
    public function getImageUrlAttribute()
    {
        // If image exists, return the URL, else null
        return $this->image ? asset('images/' . $this->image) : null;
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'activities_id');
    }
}
