<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CProfileCTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_profile_id',
        'c_tag_id',
    ];
}