<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'api_token',
        'account_type',
        'l_profile_id',
        'c_profile_id',
        'd_profile_id',
        'point',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        //'account_type',
        //'l_profile_id',
        //'c_profile_id',
        //'d_profile_id',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'account_type' => 'integer',
        'l_profile_id' => 'integer',
        'c_profile_id' => 'integer',
        'd_profile_id' => 'integer',
        'point' => 'integer',
    ];

    //Liondor リレーション
    public function LPost()
    {
        return $this->hasMany(LPost::class);
    }
    public function LProfile()
    {
        return $this->belongsTo(LProfile::class);
    }
    public function LPresent()
    {
        return $this->belongsToMany(LPresent::class);
    }
    public function LBookmark()
    {
        return $this->belongsToMany(LPost::class, 'l_post_user', 'user_id', 'l_post_id');
    }

    //Deramall リレーション
    public function DProfile()
    {
        return $this->belongsTo(DProfile::class);
    }

    public function DFollowing()
    {
        return $this->belongsToMany(User::class, 'd_follows', 'following_user_id', 'followed_user_id');
    }
    public function DFollowed()
    {
        return $this->belongsToMany(User::class, 'd_follows', 'followed_user_id', 'following_user_id');
    }

    public function DShop()
    {
        return $this->hasMany(DShop::class);
    }

    public function DMall()
    {
        return $this->hasMany(DMall::class);
    }

    public function DMallBookmark()
    {
        return $this->belongsToMany(DMall::class, 'd_mall_bookmarks', 'user_id', 'd_mall_id');
    }

    public function DOfficial()
    {
        return $this->belongsToMany(DShop::class, 'd_officials', 'user_id', 'd_shop_id');
    }

    public function DShopBookmark()
    {
        return $this->belongsToMany(DShop::class, 'd_shop_bookmarks', 'user_id', 'd_shop_id');
    }

    public function DGoods()
    {
        return $this->belongsToMany(DShop::class, 'd_goods', 'user_id', 'd_shop_id');
    }

    public function DCommentGoods()
    {
        return $this->belongsToMany(DComment::class, 'd_comment_goods', 'user_id', 'd_comment_id');
    }
}