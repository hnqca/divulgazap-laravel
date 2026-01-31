<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\GroupCategory;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');

        $groups = Group::where('is_visible', true)->with('category')->when($category, function ($query, $category) {
            $query->where('category_id', $category);
        })->get();

        return view('pages.home', compact('groups'));
    }

    public function show(string $slug)
    {
        $group = Group::where(['slug' => $slug, 'is_visible' => true])->first();

        if (!$group) {
            return redirect()->route('home');
        }

        return view('pages.group-show', [
            'group' => $group
        ]);
    }

    public function create()
    {
        $groupCategories = GroupCategory::all();

        return view('pages.group-create', [
            'groupCategories' => $groupCategories
        ]);
    }
}
