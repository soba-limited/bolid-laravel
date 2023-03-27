<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CComment extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'to_user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function to_user()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }
}
