<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DComment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'd_shop_id',
        'content',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'user_id'=>'integer',
        'd_shop_id'=>'integer',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function DCommentGoods()
    {
        return $this->belongsToMany(User::class, 'd_comment_goods', 'd_comment_id', 'user_id');
    }

    public function DCommentGoodUsers()
    {
        return $this->hasMany(DCommentGood::class, 'd_comment_id');
    }

    public function DShop()
    {
        return $this->belongsTo(DShop::class);
    }
}
