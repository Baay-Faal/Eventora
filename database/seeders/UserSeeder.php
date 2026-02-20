<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Eventora',
            'email' => 'admin@eventora.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '+221 77 000 00 00',
        ]);

        // Organisateur 1
        User::create([
            'name' => 'Moussa Fall',
            'email' => 'moussa@eventora.com',
            'password' => Hash::make('password'),
            'role' => 'organizer',
            'phone' => '+221 77 111 11 11',
        ]);

        // Organisateur 2
        User::create([
            'name' => 'Aminata Diallo',
            'email' => 'aminata@eventora.com',
            'password' => Hash::make('password'),
            'role' => 'organizer',
            'phone' => '+221 78 222 22 22',
        ]);

        // Utilisateur simple 1
        User::create([
            'name' => 'Fatou Diop',
            'email' => 'fatou@eventora.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'phone' => '+221 76 333 33 33',
        ]);

        // Utilisateur simple 2
        User::create([
            'name' => 'Ibrahima Ndiaye',
            'email' => 'ibrahima@eventora.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'phone' => '+221 70 444 44 44',
        ]);
    }
}