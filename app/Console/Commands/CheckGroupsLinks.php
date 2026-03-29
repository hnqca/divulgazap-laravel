<?php

namespace App\Console\Commands;

use App\Models\Group;
use App\Services\GroupService;
use Illuminate\Console\Command;

class CheckGroupsLinks extends Command
{
    protected $signature = 'app:check-groups-links';

    protected $description = 'Check WhatsApp group links and update visibility';

    public function handle(GroupService $groupService)
    {
        $groups = Group::where('is_visible', true)->where('last_checked_at', '<=', now()->subHours(24))->limit(25)->get();

        foreach ($groups as $group) {

            $isValid = (bool) $groupService->getGroupDataFromScraping($group->invite_code);

            $group->update([
                'is_visible'      => $isValid,
                'last_checked_at' => now()
            ]);
        }
    }
}