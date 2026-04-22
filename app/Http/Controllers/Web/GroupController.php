<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\GroupCategory;
use App\Services\TurnstileService;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $categoryName = $request->query('category');
        $categoryId   = $categoryName ? GroupCategory::where('name', $categoryName)->first() : null;
        $categoryId   = $categoryId ? $categoryId->id : null;

        if ($categoryName AND !$categoryId) {
            return redirect()->route('group.categories');
        }

        $groups = Group::where('is_visible', true);

        if ($categoryId) {
            $groups = $groups->where('category_id', $categoryId);
        }

        $groups = $groups->latest()->paginate(18);

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


    public function join(string $slug, Request $request, TurnstileService $turnstileService) 
    {
        $group = Group::where('slug', $slug)->first();

        if (!$group) {
            return redirect()->route('home');
        }

        $request->validate([
            'cloudflare_turnstile_token' => 'required'
        ]);

        $isValidTurnstile = $turnstileService->verify(
            $request->cloudflare_turnstile_token,
            $request->ip()
        );

        if (!$isValidTurnstile) {
            return redirect()->route('groups.show', $group->slug);
        }

        $group->increment('views_count');

        return redirect()->away("https://chat.whatsapp.com/{$group->invite_code}");
    }
}