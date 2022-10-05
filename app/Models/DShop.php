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
        'image_permission' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function DTag()
    {
        return $this->belongsToMany(DTag::class, 'd_shop_d_tag', 'd_shop_id', 'd_tag_id');
    }

    public function DMall()
    {
        return $this->belongsToMany(DMall::class, 'd_maill_ins', 'd_shop_id', 'd_mall_id');
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