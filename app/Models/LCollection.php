<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LCollection extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'l_category_id',
        'image1',
        'image2',
        'image3',
        'image4',
        'url',
        'view_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function LCategory()
    {
        return $this->belongsTo(LCategory::class);
    }
}