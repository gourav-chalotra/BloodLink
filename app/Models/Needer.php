<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Needer extends Model
{
    use HasFactory;
    protected $table = "needers";
    protected $primaryKey = "phone";
}