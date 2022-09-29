<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LProfile extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nicename',
        'thumbs',
        'sex',
        'zipcode',
        'zip',
        'other_address',
        'age',
        'work_type',
        'industry',
        'occupation',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'sex',
        'zipcode',
        'zip',
        'other_address',
        'age',
        'work_type',
        'industry',
        'occupation',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'age'=>'integer',
    ];

    public function users()
    {
        return $this->hasOne(\App\Models\User::class);
    }
}