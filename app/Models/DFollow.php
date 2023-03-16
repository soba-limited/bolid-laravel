<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DFollow extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = "d_follows";

    protected $fillable = [
        'following_user_id',
        'followed_user_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
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
