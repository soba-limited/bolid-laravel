<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPostBookmark extends Model
{
    use HasFactory;
    protected $fillable = [
        'c_post_id',
        'user_id',
    ];
}