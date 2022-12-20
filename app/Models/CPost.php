<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CPost extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'state',
        'c_cat_id',
        'thumbs',
        'date',
        'limite_date',
        'reward',
        'hope_reward',
        'number_of_people',
        'recruitment_quota',
        'speciality',
        'suporter',
        'amount_of_suport',
        'medium',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function CCat()
    {
        return $this->belongsTo(CCat::class);
    }

    public function CTags()
    {
        return $this->belongsToMany(CTag::class, 'c_post_c_tags', 'c_post_id', 'c_tag_id');
    }

    public function CPostApps()
    {
        return $this->belongsToMany(User::class, 'c_post_apps', 'c_post_id', 'user_id')->withPivot('state');
    }

    public function CPostBookmark()
    {
        return $this->belongsToMany(User::class, 'c_post_bookmarks', 'c_post_id', 'user_id');
    }
}