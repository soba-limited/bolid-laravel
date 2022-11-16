<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class COffice extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_profile_id',
        'title',
        'category',
        'content',
    ];

    public function CProfile()
    {
        return $this->belongsTo(CProfile::class);
    }
}