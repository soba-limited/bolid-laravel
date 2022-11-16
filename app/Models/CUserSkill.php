<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CUserSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function CUserProfiles()
    {
        return $this->belongsToMany(CUserProfile::class, 'c_user_profile_c_user_skills', 'c_user_skill_id', 'c_user_profile_id');
    }
}