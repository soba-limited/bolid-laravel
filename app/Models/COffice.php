<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class COffice extends Model
{
    use HasFactory,SoftDeletes;

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
