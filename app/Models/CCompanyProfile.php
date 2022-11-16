<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CCompanyProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_profile_id',
        'president',
        'maked',
        'jojo',
        'capital',
        'zipcode',
        'address',
        'tel',
        'site_url',
        'shop_url',
    ];

    public function CProfile()
    {
        return $this->belongsTo(CProfile::class);
    }

    public function CCompanySocials()
    {
        return $this->hasMany(CCompanySocial::class);
    }
}