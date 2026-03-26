<?php

namespace App\Http\Controllers\Api;

use App\Helpers\TextNormalizer;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGroupRequest;
use App\Models\Group;
use App\Services\GroupService;
use Illuminate\Support\Str;

class GroupController extends Controller
{
    public function validateInviteCode(string $inviteCode, GroupService $groupService)
    {
        if (Group::where('invite_code', $inviteCode)->exists()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'group_already_created'
            ], 409);
        }

        $groupDataFromScraping = $groupService->getGroupDataFromScraping($inviteCode);

        if (!$groupDataFromScraping) {
            return response()->json([
                'status'  => 'error',
                'message' => 'invalid_invite_code'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'group'  => $groupDataFromScraping
        ], 200);
    }

    public function store(StoreGroupRequest $request, GroupService $groupService)
    {
        $data = $request->validated();

        $groupDataFromScraping = $groupService->getGroupDataFromScraping($data['invite_code']);

        if (!$groupDataFromScraping) {
            return response()->json([
                'status'  => 'error',
                'message' => 'invalid_invite_code'
            ], 404);
        }

        try {
            $data['image_path'] = $groupService->storeImageFromUrl($groupDataFromScraping['image']);

            $data['slug'] = Str::slug(TextNormalizer::normalize($data['name'])) . '-' . uniqid();

            $group = Group::create($data);

            return response()->json([
                'status'   => 'success',
                'message'  => 'group_created',
                'group_id' => $group->id
            ], 201);
        } catch (\Throwable $e) {
            report($e);
            return response()->json([
                'status'  => 'error',
                'message' => 'internal_error'
            ], 500);
        }
    }
}
