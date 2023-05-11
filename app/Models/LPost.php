<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LPost extends Model
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
        'l_category_id',
        'l_series_id',
        'title',
        'thumbs',
        'mv',
        'sub_title',
        'discription',
        'content',
        'state',
        'view_date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'sub_title',
        'discription',
        'content',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'user_id'=>'integer',
        'l_category_id'=>'integer',
        'l_series_id'=>'integer',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function LBookmark()
    {
        return $this->belongsToMany(User::class, 'l_post_user', 'l_post_id', 'user_id');
    }
    public function LCategory()
    {
        return $this->belongsTo(LCategory::class);
    }
    public function LSeries()
    {
        return $this->belongsTo(LSeries::class);
    }
    public function LPickup()
    {
        return $this->belongsTo(LPickup::class);
    }
}
