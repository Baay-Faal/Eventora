<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'description',
        'image',
        'location',
        'date_start',
        'date_end',
        'time_start',
        'time_end',
        'max_participants',
        'price',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'date_start' => 'date',
            'date_end' => 'date',
            'price' => 'decimal:2',
            'max_participants' => 'integer',
        ];
    }

    // ========== RELATIONS ==========

    /**
     * L'organisateur qui a créé cet événement
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * La catégorie de cet événement
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Les inscriptions à cet événement
     */
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    /**
     * Les participants inscrits à cet événement
     */
    public function participants()
    {
        return $this->belongsToMany(User::class, 'registrations')
                    ->withPivot('status', 'ticket_number')
                    ->withTimestamps();
    }

    // ========== MÉTHODES UTILES ==========

    /**
     * Nombre de places restantes
     */
    public function remainingPlaces(): int
    {
        $confirmed = $this->registrations()
                          ->where('status', 'confirmed')
                          ->count();

        return $this->max_participants - $confirmed;
    }

    /**
     * Vérifier si l'événement est complet
     */
    public function isFull(): bool
    {
        return $this->remainingPlaces() <= 0;
    }

    /**
     * Vérifier si l'événement est gratuit
     */
    public function isFree(): bool
    {
        return $this->price == 0;
    }

    /**
     * Vérifier si l'événement est publié
     */
    public function isPublished(): bool
    {
        return $this->status === 'published';
    }

    // ========== SLUG AUTOMATIQUE ==========

    protected static function booted()
    {
        static::creating(function ($event) {
        $event->slug = Str::slug($event->title);
    });

    static::updating(function ($event) {
        $event->slug = Str::slug($event->title);
    });
    }
}