<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',  // Add first name
        'last_name',   // Add last name
        'bio',         // Add bio
        'user_type',   // Add user type (if needed)
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // In User.php (User Model)
    public function bookings()
    {
        return $this->hasMany(Payment::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
