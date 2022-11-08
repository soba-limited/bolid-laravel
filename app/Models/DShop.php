<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DShop extends Model
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
        'url',
        'name',
        'description',
        'thumbs',
        'image_permission',
        'official_user_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'description',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'user_id'=>'integer',
        'image_permission' => 'integer',
        'official_user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function DTags()
    {
        return $this->belongsToMany(DTag::class, 'd_shop_d_tags', 'd_shop_id', 'd_tag_id');
    }

    public function DMalls()
    {
        return $this->belongsToMany(DMall::class, 'd_mall_ins', 'd_shop_id', 'd_mall_id');
    }

    public function DGoods()
    {
        return $this->belongsToMany(User::class, 'd_goods', 'd_shop_id', 'user_id');
    }

    /*
    public function DShopBookmarks()
    {
        return $this->belongsToMany(User::class, 'd_shop_bookmarks', 'd_shop_id', 'user_id');
    }
    */

    public function DComments()
    {
        return $this->hasMany(DComment::class);
    }

    public function DPickups()
    {
        return $this->hasMany(DPickup::class);
    }
    public function DOverviews()
    {
        return $this->hasMany(DOverview::class);
    }
    public function DInfos()
    {
        return $this->hasMany(DInfo::class);
    }
    public function DCoupons()
    {
        return $this->hasMany(DCoupon::class);
    }
    public function DItems()
    {
        return $this->hasMany(DItem::class);
    }
    public function DSocials()
    {
        return $this->hasMany(DSocial::class);
    }
    public function DInstaApiTokens()
    {
        return $this->hasMany(DInstaApiToken::class);
    }
}