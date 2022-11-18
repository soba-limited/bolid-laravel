<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CUserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_profile_id',
        'brand',
        'appeal_text',
        'appeal_image',
    ];

    public function CProfile()
    {
        return $this->belongsTo(CProfile::class);
    }

    public function CUserSocials()
    {
        return $this->hasMany(CUserSocial::class);
    }

    public function CUserSkills()
    {
        return $this->belongsToMany(CUserSkill::class, 'c_user_profile_c_user_skills', 'c_user_profile_id', 'c_user_skill_id');
    }
}