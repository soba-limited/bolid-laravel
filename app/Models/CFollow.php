<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CFollow extends Model
{
    use HasFactory;

    protected $fillable = [
        'following_user_id',
        'followed_user_id'
    ];

    protected $casts = [
        'following_user_id'=>'integer',
        'followed_user_id'=>'integer',
    ];

    public function Following()
    {
        return $this->belongsTo(User::class, 'following_user_id');
    }

    public function Followed()
    {
        return $this->belongsTo(User::class, 'followed_user_id');
    }
}