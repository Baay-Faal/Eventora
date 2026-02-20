<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ========== RELATIONS ==========

    /**
     * Les événements créés par cet utilisateur (en tant qu'organisateur)
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    /**
     * Les événements auxquels l'utilisateur est inscrit (en tant que participant)
     */
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    /**
     * Les événements auxquels l'utilisateur participe (via registrations)
     */
    public function registeredEvents()
    {
        return $this->belongsToMany(Event::class, 'registrations')
                    ->withPivot('status', 'ticket_number')
                    ->withTimestamps();
    }

    // ========== MÉTHODES UTILES ==========

    /**
     * Vérifier si l'utilisateur est admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Vérifier si l'utilisateur est organisateur
     */
    public function isOrganizer(): bool
    {
        return $this->role === 'organizer';
    }

    /**
     * Vérifier si l'utilisateur est un simple user
     */
    public function isUser(): bool
    {
        return $this->role === 'user';
    }
}