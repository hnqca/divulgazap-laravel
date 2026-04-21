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
                'name' => ['en' => 'Other', 'pt' => 'Outros', 'es' => 'Otros'],
                'icon' => 'question', // Icon names follow Font Awesome (fa-{icon}). See: https://fontawesome.com/icons
            ],
            [
                'name' => ['en' => 'Gym', 'pt' => 'Academia', 'es' => 'Gimnasio'],
                'icon' => 'dumbbell',
            ],
            [
                'name' => ['en' => 'Love and Romance', 'pt' => 'Amor e Romance', 'es' => 'Amor y Romance'],
                'icon' => 'heart',
            ],
            [
                'name' => ['en' => 'Cars and Motorcycles', 'pt' => 'Carros e Motos', 'es' => 'Autos y Motos'],
                'icon' => 'car',
            ],
            [
                'name' => ['en' => 'Cities', 'pt' => 'Cidades', 'es' => 'Ciudades'],
                'icon' => 'city',
            ],
            [
                'name' => ['en' => 'Buying and Selling', 'pt' => 'Compra e Venda', 'es' => 'Compra y Venta'],
                'icon' => 'bag-shopping',
            ],
            [
                'name' => ['en' => 'Cartoons and Anime', 'pt' => 'Desenhos e Animes', 'es' => 'Dibujos y Anime'],
                'icon' => 'bomb',
            ],
            [
                'name' => ['en' => 'Education', 'pt' => 'Educação', 'es' => 'Educación'],
                'icon' => 'book',
            ],
            [
                'name' => ['en' => 'Sports', 'pt' => 'Esportes', 'es' => 'Deportes'],
                'icon' => 'futbol',
            ],
            [
                'name' => ['en' => 'Events', 'pt' => 'Eventos', 'es' => 'Eventos'],
                'icon' => 'people-group',
            ],
            [
                'name' => ['en' => 'Stickers', 'pt' => 'Figurinhas', 'es' => 'Stickers'],
                'icon' => 'note-sticky',
            ],
            [
                'name' => ['en' => 'Movies and Series', 'pt' => 'Filmes e Séries', 'es' => 'Películas y Series'],
                'icon' => 'clapperboard',
            ],
            [
                'name' => ['en' => 'Quotes and Messages', 'pt' => 'Frases e Mensagens', 'es' => 'Frases y Mensajes'],
                'icon' => 'comment',
            ],
            [
                'name' => ['en' => 'Friendship', 'pt' => 'Amizade', 'es' => 'Amistad'],
                'icon' => 'face-smile',
            ],
            [
                'name' => ['en' => 'Technology and Programming', 'pt' => 'Tecnologia e Programação', 'es' => 'Tecnología y Programación'],
                'icon' => 'code',
            ],
            [
                'name' => ['en' => 'Games', 'pt' => 'Jogos', 'es' => 'Juegos'],
                'icon' => 'gamepad',
            ],
            [
                'name' => ['en' => 'Memes', 'pt' => 'Memes', 'es' => 'Memes'],
                'icon' => 'face-grin-squint-tears',
            ],
            [
                'name' => ['en' => 'Music', 'pt' => 'Música', 'es' => 'Música'],
                'icon' => 'music',
            ],
            [
                'name' => ['en' => 'News', 'pt' => 'Notícias', 'es' => 'Noticias'],
                'icon' => 'newspaper',
            ],
            [
                'name' => ['en' => 'Recipes', 'pt' => 'Receitas', 'es' => 'Recetas'],
                'icon' => 'utensils',
            ],
            [
                'name' => ['en' => 'Job Vacancies', 'pt' => 'Vagas de Emprego', 'es' => 'Ofertas de Trabajo'],
                'icon' => 'briefcase',
            ],
            [
                'name' => ['en' => 'Travel and Tourism', 'pt' => 'Viagens e Turismo', 'es' => 'Viajes y Turismo'],
                'icon' => 'plane',
            ],
        ];

        foreach ($categories as $category) {
            GroupCategory::updateOrCreate(
                ['name' => $category['name']],
                ['icon' => $category['icon']] 
            );
        }
    }
}
