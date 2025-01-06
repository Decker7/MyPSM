<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'approval_code',
        'phone_number',
        'status', // Include the new column
        'user_id', // New column for the current user's ID


    ];

    public function booking()
    {
        return $this->belongsTo(Payment::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'booking_id', 'id');
    }
}
