<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupCategory extends Model
{
    protected $table = "group_categories";

    public function groups()
    {
        return $this->hasMany(Group::class, 'category_id');
    }
}
