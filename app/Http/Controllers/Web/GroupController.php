<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');

        $groups = Group::with('category')->when($category, function ($query, $category) {
            $query->where('category_id', $category);
        })->get();

        return view('pages.home', compact('groups'));
    }
}