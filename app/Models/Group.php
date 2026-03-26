<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = "groups";

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'image_path',
        'invite_code',
        'is_visible',
        'last_checked_at'
    ];

    public function category()
    {
        return $this->belongsTo(GroupCategory::class, 'category_id');
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }
}
