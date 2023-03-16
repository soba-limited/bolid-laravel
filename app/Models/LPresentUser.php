<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LPresentUser extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'l_present_user';

    protected $fillable = [
        'user_id',
        'l_present_id',
        'account',
        'marriage',
        'child',
        'income',
        'hobby',
        'brand',
        'cosmetic',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'updated_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'user_id'=>'integer',
        'l_present_id'=>'integer',
        'marriage'=>'integer',
        'child'=>'integer',
    ];
}
