<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'status',
        'ticket_number',
    ];

    // ========== RELATIONS ==========

    /**
     * L'utilisateur inscrit
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * L'événement concerné
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // ========== MÉTHODES UTILES ==========

    /**
     * Générer un numéro de ticket unique
     */
    public static function generateTicketNumber(): string
    {
        $year = date('Y');
        $random = strtoupper(Str::random(6));
        return "EVT-{$year}-{$random}";
    }

    /**
     * Vérifier si l'inscription est confirmée
     */
    public function isConfirmed(): bool
    {
        return $this->status === 'confirmed';
    }

    /**
     * Vérifier si l'inscription est en attente
     */
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }
}