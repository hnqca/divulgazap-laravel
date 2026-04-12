<?php

namespace Database\Seeders;

use App\Models\GroupCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupCategorySeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $categories = [
            [
                'name' => 'Other',
                'icon' => 'question', // Icon names follow Font Awesome (fa-{icon}). See: https://fontawesome.com/icons
            ],
            [
                'name' => 'Gym',
                'icon' => 'dumbbell',
            ],
            [
                'name' => 'Love and Romance',
                'icon' => 'heart',
            ],
            [
                'name' => 'Cars and Motorcycles',
                'icon' => 'car',
            ],
            [
                'name' => 'Cities',
                'icon' => 'city',
            ],
            [
                'name' => 'Buying and Selling',
                'icon' => 'bag-shopping',
            ],
            [
                'name' => 'Cartoons and Anime',
                'icon' => 'bomb',
            ],
            [
                'name' => 'Education',
                'icon' => 'book',
            ],
            [
                'name' => 'Sports',
                'icon' => 'futbol',
            ],
            [
                'name' => 'Events',
                'icon' => 'people-group',
            ],
            [
                'name' => 'Stickers',
                'icon' => 'note-sticky',
            ],
            [
                'name' => 'Movies and Series',
                'icon' => 'clapperboard',
            ],
            [
                'name' => 'Quotes and Messages',
                'icon' => 'comment',
            ],
            [
                'name' => 'Friendship',
                'icon' => 'face-smile',
            ],
            [
                'name' => 'Technology and Programming',
                'icon' => 'code',
            ],
            [
                'name' => 'Games',
                'icon' => 'gamepad',
            ],
            [
                'name' => 'Memes',
                'icon' => 'face-grin-squint-tears',
            ],
            [
                'name' => 'Music',
                'icon' => 'music',
            ],
            [
                'name' => 'News',
                'icon' => 'newspaper',
            ],
            [
                'name' => 'Recipes',
                'icon' => 'utensils',
            ],
            [
                'name' => 'Job Vacancies',
                'icon' => 'briefcase',
            ],
            [
                'name' => 'Travel and Tourism',
                'icon' => 'plane',
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
