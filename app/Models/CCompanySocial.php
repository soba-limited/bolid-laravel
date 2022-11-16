<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CCompanySocial extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_company_profile_id',
        'name',
        'url',
    ];

    public function CCompanyProfile()
    {
        return $this->belongsTo(CCompanyProfile::class);
    }
}