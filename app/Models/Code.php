<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $fillable = ['activity_id', 'code_number'];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    
}
