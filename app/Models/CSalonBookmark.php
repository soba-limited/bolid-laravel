<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CSalonBookmark extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_salon_id',
        'user_id',
    ];
}