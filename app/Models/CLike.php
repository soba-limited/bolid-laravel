<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CLike extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_profile_id',
        'title',
        'thumbs',
        'text',
    ];

    public function CProfile()
    {
        return $this->belongsTo(CProfile::class);
    }
}