<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DMall extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'deleted_at',
        'created_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'user_id'=>'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function DShop()
    {
        return $this->belongsToMany(DShop::class, 'd_maill_ins', 'd_mall_id', 'd_shop_id');
    }

    public function DMallBookmarkUser()
    {
        return $this->belongsToMany(User::class, 'd_mall_bookmarks', 'd_mall_id', 'user_id');
    }
}