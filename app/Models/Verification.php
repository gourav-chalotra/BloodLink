<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    protected $fillable = ['user_id', 'phone', 'otp', 'expires_at', 'verified_at']; // Added user_id

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}