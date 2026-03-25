<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GroupService
{
    public function getGroupDataFromScraping(string $inviteCode)
    {
        $inviteLink = "https://chat.whatsapp.com/{$inviteCode}";

        $patterns = [
            'name'  => '/<h3\b[^>]*class="[^"]*\b_9vd5\b[^"]*\b_9scr\b[^"]*"[^>]*>(.*?)<\/h3>/s',
            'image' => '/<img class="_ari4" src="(.*?)"/'
        ];

        $scraping = new WebScrapingService($inviteLink);

        $matchesName  = $scraping->getMatches($patterns['name']);
        $matchesImage = $scraping->getMatches($patterns['image']);

        $data = [
            'name'  => $matchesName[1][0] ?? null,
            'image' => $matchesName[1][0] ? html_entity_decode($matchesImage[1][0], ENT_QUOTES | ENT_HTML5) : null,
        ];

        if (is_null($data['name']) || is_null($data['image'])) {
            return false;
        }

        return $data;
    }

    public function storeImageFromUrl(string $url)
    {
        $image = file_get_contents($url);

        $filename = Str::uuid() . '.jpg';

        Storage::disk('public')->put("images/groups/{$filename}", $image);

        return $filename ?? null;
    }
}