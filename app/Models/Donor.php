<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;
    protected $table = "donors";
    protected $primaryKey = "id"; // Fixed to match database schema
    protected $fillable = [
        'username',
        'email',
        'phone',
        'location',
        'blood_group',
    ];
}