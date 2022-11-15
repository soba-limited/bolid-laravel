<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function CPrs()
    {
        return $this->belongsToMany(CPr::class, 'c_pr_c_tags', 'c_tag_id', 'c_pr_id');
    }
    public function CPosts()
    {
        return $this->belongsToMany(CPost::class, 'c_post_c_tags', 'c_tag_id', 'c_post_id');
    }
    public function CSalons()
    {
        return $this->belongsToMany(CSalon::class, 'c_salon_c_tags', 'c_tag_id', 'c_salon_id');
    }
    public function CProfiles()
    {
        return $this->belongsToMany(CProfile::class, 'c_profile_c_tags', 'c_tag_id', 'c_profile_id');
    }
}