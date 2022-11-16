<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_profile_id',
        'title',
        'thumbs',
    ];

    public function CProfile()
    {
        return $this->belongsTo(CProfile::class);
    }
}