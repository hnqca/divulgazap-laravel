<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\GroupCategory;
use Illuminate\Http\Request;

class GroupCategoryController extends Controller
{
    public function index()
    {
        $categories = GroupCategory::withCount([
            'groups as visible_groups_count' => function ($query) {
                $query->where(['is_visible' => true]);
            }
        ])->orderBy('visible_groups_count', 'desc')->get();

        return view('pages.categories', [
            'groupCategories' => $categories
        ]);
    }
}
