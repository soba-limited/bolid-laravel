<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CFirstclass extends Model
{
    use HasFactory;

    protected $fillable = [
        'thumbs',
        'title',
        'url',
        'category_id',
        'user_id',
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