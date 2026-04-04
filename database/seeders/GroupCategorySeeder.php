<?php

namespace Database\Seeders;

use App\Models\GroupCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupCategorySeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Other',
                'icon' => 'other.svg',
            ],
            [
                'name' => 'Gym',
                'icon' => 'gym.svg',
            ],
            [
                'name' => 'Love and Romance',
                'icon' => 'love.svg',
            ],
            [
                'name' => 'Cars and Motorcycles',
                'icon' => 'car.svg',
            ],
            [
                'name' => 'Cities',
                'icon' => 'city.svg',
            ],
            [
                'name' => 'Buying and Selling',
                'icon' => 'ecommerce.svg',
            ],
            [
                'name' => 'Cartoons and Anime',
                'icon' => 'cartoon.svg',
            ],
            [
                'name' => 'Education',
                'icon' => 'study.svg',
            ],
            [
                'name' => 'Sports',
                'icon' => 'sport.svg',
            ],
            [
                'name' => 'Events',
                'icon' => 'events.svg',
            ],
            [
                'name' => 'Stickers',
                'icon' => 'sticker.svg',
            ],
            [
                'name' => 'Movies and Series',
                'icon' => 'movie.svg',
            ],
            [
                'name' => 'Quotes and Messages',
                'icon' => 'quote.svg',
            ],
            [
                'name' => 'Friendship',
                'icon' => 'friend.svg',
            ],
            [
                'name' => 'Technology and Programming',
                'icon' => 'code.svg',
            ],
            [
                'name' => 'Games',
                'icon' => 'game.svg',
            ],
            [
                'name' => 'Memes',
                'icon' => 'meme.svg',
            ],
            [
                'name' => 'Music',
                'icon' => 'music.svg',
            ],
            [
                'name' => 'News',
                'icon' => 'news.svg',
            ],
            [
                'name' => 'Recipes',
                'icon' => 'food.svg',
            ],
            [
                'name' => 'Job Vacancies',
                'icon' => 'job.svg',
            ],
            [
                'name' => 'Travel and Tourism',
                'icon' => 'travel.svg',
            ]
        ];

        foreach ($categories as $category) {
            GroupCategory::updateOrCreate(
                ['name' => $category['name']],
                ['icon' => $category['icon']] 
            );
        }
    }
}
