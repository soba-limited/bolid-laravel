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
        'account_type',
        'l_profile_id',
        'c_profile_id',
        'd_profile_id',
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
}