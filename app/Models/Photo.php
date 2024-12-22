<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    // Add mass-assignable attributes
    protected $fillable = ['activities_id', 'path_photo'];

    /**
     * Define the relationship with the Activity model.
     * A photo belongs to an activity.
     */
    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activities_id');
    }
}
