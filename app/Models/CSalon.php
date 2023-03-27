<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CSalon extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'user_id',
        'state',
        'title',
        'thumbs',
        'date',
        'plan',
        'number_of_people',
        'content',
        'stripe_api_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function CTags()
    {
        return $this->belongsToMany(CTag::class, 'c_salon_c_tags', 'c_salon_id', 'c_tag_id');
    }

    public function CSalonBookmarks()
    {
        return $this->belongsToMany(User::class, 'c_salon_bookmarks', 'c_salon_id', 'user_id');
    }

    public function CSalonApps()
    {
        return $this->belongsToMany(User::class, 'c_salon_apps', 'c_salon_id', 'user_id');
    }
}
