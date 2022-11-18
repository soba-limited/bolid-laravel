<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'nicename',
        'profile',
        'thumbs',
        'image1',
        'image2',
        'image3',
        'zip',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function CTags()
    {
        return $this->belongsToMany(CTag::class, 'c_profile_c_tags', 'c_profile_id', 'c_tag_id');
    }

    public function CUserProfile()
    {
        return $this->hasOne(CUserProfile::class);
    }

    public function CCompanyProfile()
    {
        return $this->hasOne(CCompanyProfile::class);
    }

    public function CPresident()
    {
        return $this->hasOne(CPresident::class);
    }

    public function CLikes()
    {
        return $this->hasMany(CLike::class);
    }

    public function CSusts()
    {
        return $this->hasMany(CSust::class);
    }

    public function COffieces()
    {
        return $this->hasMany(COffiece::class);
    }

    public function CCoupons()
    {
        return $this->hasMany(CCoupon::class);
    }

    public function CCards()
    {
        return $this->hasMany(CCard::class);
    }

    public function CItems()
    {
        return $this->hasMany(CItem::class);
    }

    public function CBusinessInformations()
    {
        return $this->hasMany(CBusinessInformation::class);
    }
}
