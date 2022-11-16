<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPostCTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'c_pr_id',
        'c_tag_id',
    ];
}