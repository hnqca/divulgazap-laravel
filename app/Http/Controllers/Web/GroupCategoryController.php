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
                $query->where('is_visible', true);
            }
        ])->get();

        return view('pages.categories', [
            'groupCategories' => $categories
        ]);
    }
}
