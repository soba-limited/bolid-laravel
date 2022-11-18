<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CPr extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];

    protected $hidden = [
        'count'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function CTags()
    {
        return $this->belongsToMany(CTag::class, 'c_pr_c_tags', 'c_pr_id', 'c_tag_id');
    }

    public function CPrCounts()
    {
        return $this->belongsToMany(User::class, 'c_pr_counts', 'c_pr_id', 'user_id');
    }
}