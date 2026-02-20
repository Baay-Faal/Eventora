<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Concert',
                'slug' => Str::slug('Concert'),
                'description' => 'Événements musicaux et spectacles',
            ],
            [
                'name' => 'Conférence',
                'slug' => Str::slug('Conférence'),
                'description' => 'Séminaires, formations et conférences',
            ],
            [
                'name' => 'Sport',
                'slug' => Str::slug('Sport'),
                'description' => 'Compétitions et événements sportifs',
            ],
            [
                'name' => 'Festival',
                'slug' => Str::slug('Festival'),
                'description' => 'Festivals culturels et artistiques',
            ],
            [
                'name' => 'Mariage',
                'slug' => Str::slug('Mariage'),
                'description' => 'Cérémonies de mariage',
            ],
            [
                'name' => 'Atelier',
                'slug' => Str::slug('Atelier'),
                'description' => 'Ateliers pratiques et workshops',
            ],
            [
                'name' => 'Networking',
                'slug' => Str::slug('Networking'),
                'description' => 'Rencontres professionnelles et networking',
            ],
            [
                'name' => 'Autre',
                'slug' => Str::slug('Autre'),
                'description' => 'Autres types d\'événements',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}