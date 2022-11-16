<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CUserSocial extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_user_profile_id',
        'name',
        'url',
        'follower',
    ];

    public function CUserProfile()
    {
        return $this->belongsTo(CUserProfile::class);
    }
}