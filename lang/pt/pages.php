<?php

return [

    'home' => [
        'hero' => [
            'title'       => 'Encontre os melhores grupos',
            'description' => 'Conecte-se com pessoas que compartilham seus interesses em jogos, filmes, amizade, tecnologia, estudos e muito mais.'
        ],
    ],

    'categories' => [
        'hero' => [
            'title'       => "Categorias",
            'description' => "Explore grupos por tema e encontre exatamente o que você está procurando."
        ],
    ],

    'groups' => [
        'show' => [
            'promote_cta' => 'Quer promover seu grupo também? Clique aqui!',
        ],
        'create' => [
            'title'    => 'Divulgue seu Grupo',
            'subtitle' => 'e comece a receber novos membros! 😍',
            'form' => [
                'group_link'        => 'Link do grupo (WhatsApp)',
                'verify_link'       => 'Verificar link',
                'category'          => 'Categoria',
                'category_hint'     => 'Escolha uma categoria',
                'group_name'        => 'Nome do grupo',
                'description'       => 'Descrição (opcional)',
                'description_hint'  => 'Conte um pouco sobre este grupo',
                'submit'            => 'Enviar grupo',
            ],
            'preview' => [
                'title'             => 'Com o seu grupo aparecerá',
                'category'          => 'Categoria',
                'group_name'        => 'Nome do grupo',
                'description_mock'  => 'A descrição do seu grupo aparecerá aqui...',
            ],
        ],
        'empty' => [
            'title' => 'Nenhum grupo encontrado 😢',
            'with_category' => [
                'message' => 'Talvez tentar outra categoria?',
                'action'  => 'Ver categorias',
            ],
            'without_category' => [
                'message' => 'Que tal ser o primeiro por aqui? 👀',
                'action'  => 'Compartilhar grupo',
            ],
        ],
    ]
];
