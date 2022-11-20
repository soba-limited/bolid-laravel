<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CSalonCTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_salon_id',
        'c_tag_id',
    ];
}
