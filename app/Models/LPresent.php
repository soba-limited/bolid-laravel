<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LPresent extends Model
{
    use HasFactory;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'thumbs',
        'offer',
        'limit',
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
        'limit'=>'datetime',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class)->withPivot(['account','marriage','child','income','brand','cosmetic','hobby']);
    }
}
