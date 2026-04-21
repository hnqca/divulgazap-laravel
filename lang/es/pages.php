<?php

return [

    'home' => [
        'hero' => [
            'title'       => 'Encuentra los mejores grupos',
            'description' => 'Conéctate con personas que comparten tus intereses en juegos, películas, amistad, tecnología, estudios y mucho más.'
        ],
    ],

    'categories' => [
        'hero' => [
            'title'       => 'Categorías',
            'description' => 'Explora grupos por tema y encuentra exactamente lo que estás buscando.'
        ],
    ],

    'groups' => [
        'show' => [
            'promote_cta' => '¿Quieres promocionar tu grupo también? ¡Haz clic aquí!',
        ],
        'create' => [
            'title'    => 'Promociona tu grupo',
            'subtitle' => '¡y empieza a recibir nuevos miembros! 😍',

            'form' => [
                'group_link'        => 'Enlace del grupo (WhatsApp)',
                'verify_link'       => 'Verificar enlace',
                'category'          => 'Categoría',
                'category_hint'     => 'Elige una categoría',
                'group_name'        => 'Nombre del grupo',
                'description'       => 'Descripción (opcional)',
                'description_hint'  => 'Cuéntanos un poco sobre este grupo',
                'submit'            => 'Enviar grupo',
            ],
            'preview' => [
                'title'             => 'Vista previa del grupo',
                'category'          => 'Categoría',
                'group_name'        => 'Nombre del grupo',
                'description_mock'  => 'La descripción de tu grupo aparecerá aquí...',
            ],
        ],
        'empty' => [
            'title' => 'No se encontraron grupos 😢',
            'with_category' => [
                'message' => '¿Quizás probar con otra categoría?',
                'action'  => 'Ver categorías',
            ],
            'without_category' => [
                'message' => '¿Quieres ser el primero aquí? 👀',
                'action'  => 'Compartir grupo',
            ],
        ],
    ]
];