<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'user_id' => 2,
                'category_id' => 1,
                'title' => 'Concert de Youssou N\'Dour',
                'slug' => Str::slug('Concert de Youssou N\'Dour'),
                'description' => 'Un concert exceptionnel de Youssou N\'Dour au Grand Théâtre de Dakar.',
                'location' => 'Grand Théâtre de Dakar',
                'date_start' => '2025-03-15',
                'date_end' => '2025-03-15',
                'time_start' => '20:00',
                'time_end' => '23:30',
                'max_participants' => 500,
                'price' => 5000,
                'status' => 'published',
            ],
            [
                'user_id' => 2,
                'category_id' => 3,
                'title' => 'Tournoi de Football Inter-Quartiers',
                'slug' => Str::slug('Tournoi de Football Inter-Quartiers'),
                'description' => 'Grand tournoi de football réunissant les meilleurs équipes de Dakar.',
                'location' => 'Stade Léopold Sédar Senghor',
                'date_start' => '2025-04-10',
                'date_end' => '2025-04-12',
                'time_start' => '09:00',
                'time_end' => '18:00',
                'max_participants' => 200,
                'price' => 0,
                'status' => 'published',
            ],
            [
                'user_id' => 3,
                'category_id' => 2,
                'title' => 'Conférence Tech Dakar 2025',
                'slug' => Str::slug('Conférence Tech Dakar 2025'),
                'description' => 'La plus grande conférence tech du Sénégal.',
                'location' => 'Hotel King Fahd Palace',
                'date_start' => '2025-05-20',
                'date_end' => '2025-05-21',
                'time_start' => '08:00',
                'time_end' => '17:00',
                'max_participants' => 300,
                'price' => 15000,
                'status' => 'published',
            ],
            [
                'user_id' => 3,
                'category_id' => 4,
                'title' => 'Festival des Arts de Saint-Louis',
                'slug' => Str::slug('Festival des Arts de Saint-Louis'),
                'description' => 'Festival culturel célébrant les arts à Saint-Louis.',
                'location' => 'Place Faidherbe, Saint-Louis',
                'date_start' => '2025-06-05',
                'date_end' => '2025-06-08',
                'time_start' => '10:00',
                'time_end' => '22:00',
                'max_participants' => 1000,
                'price' => 2000,
                'status' => 'draft',
            ],
            [
                'user_id' => 2,
                'category_id' => 6,
                'title' => 'Atelier Laravel pour Débutants',
                'slug' => Str::slug('Atelier Laravel pour Débutants'),
                'description' => 'Apprenez à créer des applications web avec Laravel.',
                'location' => 'Dakar Innovation Hub',
                'date_start' => '2025-03-25',
                'date_end' => '2025-03-25',
                'time_start' => '09:00',
                'time_end' => '16:00',
                'max_participants' => 30,
                'price' => 10000,
                'status' => 'published',
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}