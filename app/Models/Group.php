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
        'lang',
        'description',
        'image_path',
        'invite_code',
        'is_visible',
        'views_count',
        'last_checked_at'
    ];

    public function category()
    {
        return $this->belongsTo(GroupCategory::class, 'category_id');
    }

    public function getCreatedAtFormattedAttribute()
    {
        return \Carbon\Carbon::parse($this->created_at)->translatedFormat('j M, Y');
    }

    public function scopeOrderByPreferredLanguage($query, $locale)
    {
        return $query->orderByRaw("CASE WHEN lang = ? THEN 0 ELSE 1 END", [$locale]);
    }
}
