<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPrCounts extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'c_pr_id',
    ];
}