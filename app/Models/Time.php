<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'activity_id',
        'date',
        'time',
    ];

    /**
     * Get the activity that owns the time.
     */
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
