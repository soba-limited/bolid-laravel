<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CProfile extends Model
{
    use HasFactory,SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;


    protected $fillable = [
        'nicename',
        'profile',
        'thumbs',
        'image1',
        'image2',
        'image3',
        'zip',
        'title',
    ];

    protected $softCascade = [
        //'CPresident',
        'CLikes',
        'CSusts',
        'COffices',
        'CCoupons',
        'CCards',
        'CItems',
        'CBusinessInformaitions',
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

    public function COffices()
    {
        return $this->hasMany(COffice::class);
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

    public function CBusinessInformaitions()
    {
        return $this->hasMany(CBusinessInformaition::class);
    }
}
