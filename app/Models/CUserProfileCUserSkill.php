<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CUserProfileCUserSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_user_profile_id',
        'c_user_skill_id',
    ];
}