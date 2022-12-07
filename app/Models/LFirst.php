<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LFirst extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'l_category_id',
        'thumbs',
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