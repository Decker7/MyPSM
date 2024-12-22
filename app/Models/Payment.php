<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // Define the table name if it's not following Laravel's conventions
    protected $table = 'payments';

    // Define the fields that are mass assignable
    protected $fillable = [
        'activity_id',
        'user_id',  // Add this line
        'first_name',
        'last_name',
        'email',
        'phone',
        'number_of_adults',
        'number_of_children',
        'date_time',
        'total_price',
        'special_requests',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id'); // Adjust 'activity_id' according to your foreign key naming
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function register()
    {
        return $this->hasOne(Register::class, 'booking_id', 'id');
    }
}
