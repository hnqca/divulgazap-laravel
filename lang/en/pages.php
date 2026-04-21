<?php

return [

    'home' => [
        'hero' => [
            'title'       => 'Find the best groups',
            'description' => 'Connect with people who share your interests in gaming, movies, friendship, tech, studies, and much more.'
        ],
    ],

    'categories' => [
        'hero' => [
            'title'      => "Categories",
            'description' => "Explore groups by theme and find exactly what you're looking for."
        ],
    ],

    'groups' => [
        'show' => [
            'promote_cta' => 'Want to promote your group too? Click here!',
        ],
        'create' => [
            'title'    => 'Promote your Group',
            'subtitle' => 'and start getting new members! 😍',

            'form' => [
                'group_link'        => 'Group link (WhatsApp)',
                'verify_link'       => 'Verify link',
                'category'          => 'Category',
                'category_hint'     => 'Choose a category',
                'group_name'        => 'Group name',
                'description'       => 'Description (optional)',
                'description_hint'  => 'Tell us a little about this group',
                'submit'            => 'Submit Group',
            ],

            'preview' => [
                'title'             => 'Group preview',
                'category'          => 'Category',
                'group_name'        => 'Group name',
                'description_mock'  => 'Your group description will appear here...',
            ],
        ],
        'empty' => [
            'title' => 'No groups found 😢',
            'with_category' => [
                'message' => 'Maybe try a different category?',
                'action'  => 'View categories',
            ],
            'without_category' => [
                'message' => 'Want to be the first one here? 👀',
                'action'  => 'Share Group',
            ],
        ],
    ]

];
