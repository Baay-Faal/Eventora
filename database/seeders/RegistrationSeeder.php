<?php

namespace Database\Seeders;

use App\Models\Registration;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    public function run(): void
    {
        $registrations = [
            [
                'user_id' => 4, // Fatou
                'event_id' => 1, // Concert
                'status' => 'confirmed',
                'ticket_number' => 'EVT-2025-A1B2C3',
            ],
            [
                'user_id' => 5, // Ibrahima
                'event_id' => 1, // Concert
                'status' => 'confirmed',
                'ticket_number' => 'EVT-2025-D4E5F6',
            ],
            [
                'user_id' => 4, // Fatou
                'event_id' => 3, // Conférence Tech
                'status' => 'pending',
                'ticket_number' => 'EVT-2025-G7H8I9',
            ],
            [
                'user_id' => 5, // Ibrahima
                'event_id' => 2, // Tournoi Football
                'status' => 'confirmed',
                'ticket_number' => 'EVT-2025-J1K2L3',
            ],
            [
                'user_id' => 4, // Fatou
                'event_id' => 5, // Atelier Laravel
                'status' => 'confirmed',
                'ticket_number' => 'EVT-2025-M4N5O6',
            ],
        ];

        foreach ($registrations as $registration) {
            Registration::create($registration);
        }
    }
}