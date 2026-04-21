<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupCategory extends Model
{
    protected $table = "group_categories";

    protected $casts = [
        'name' => 'array',
    ];

    public function getNameAttribute($value)
    {
        $value = is_array($value) ? $value : json_decode($value, true);

        if (!is_array($value)) {
            return null;
        }

        $locale = app()->getLocale();

        return $value[$locale]
            ?? $value[config('app.fallback_locale')]
            ?? null;
    }

    public function groups()
    {
        return $this->hasMany(Group::class, 'category_id');
    }
}
