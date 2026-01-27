<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = "groups";

    public function category()
    {
        return $this->belongsTo(GroupCategory::class, 'category_id');
    }
}
