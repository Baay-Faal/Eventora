<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    // Liste des inscriptions (Admin = toutes, Organizer = ses événements)
    public function index()
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            $registrations = Registration::with(['user', 'event'])->latest()->paginate(20);
        } else {
            // Organizer : seulement les inscriptions de SES événements
            $eventIds = $user->events()->pluck('id');
            $registrations = Registration::with(['user', 'event'])
                                         ->whereIn('event_id', $eventIds)
                                         ->latest()
                                         ->paginate(20);
        }

        return view('registrations.index', compact('registrations'));
    }

    // S'inscrire à un événement
    public function store(Event $event)
    {
        $user = auth()->user();

        // Vérifier si déjà inscrit
        $existing = Registration::where('user_id', $user->id)
                                ->where('event_id', $event->id)
                                ->first();

        if ($existing) {
            return back()->with('error', 'Vous êtes déjà inscrit à cet événement !');
        }

        // Vérifier si l'événement est complet
        if ($event->isFull()) {
            return back()->with('error', 'Cet événement est complet !');
        }

        // Vérifier si l'événement est publié
        if (!$event->isPublished()) {
            return back()->with('error', 'Cet événement n\'est pas disponible !');
        }

        // Créer l'inscription
        Registration::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'status' => 'pending',
            'ticket_number' => 'EVT-' . date('Y') . '-' . strtoupper(Str::random(6)),
        ]);

        return back()->with('success', 'Inscription réussie ! En attente de confirmation.');
    }

    // Mes inscriptions (User)
    public function myRegistrations()
    {
        $registrations = auth()->user()
                               ->registrations()
                               ->with(['event', 'event.category'])
                               ->latest()
                               ->get();

        return view('registrations.my-registrations', compact('registrations'));
    }

    // Confirmer une inscription (Admin ou Organizer propriétaire)
    public function confirm(Registration $registration)
    {
        $user = auth()->user();

        // Vérifier les droits
        if (!$user->isAdmin() && $registration->event->user_id !== $user->id) {
            abort(403, 'Vous n\'avez pas le droit de confirmer cette inscription.');
        }

        $registration->update(['status' => 'confirmed']);

        return back()->with('success', 'Inscription confirmée !');
    }

    // Annuler une inscription
    public function cancel(Registration $registration)
    {
        $user = auth()->user();

        // Le user peut annuler SA propre inscription
        // L'admin peut tout annuler
        // L'organizer peut annuler les inscriptions de SES événements
        if ($registration->user_id !== $user->id 
            && !$user->isAdmin() 
            && $registration->event->user_id !== $user->id) {
            abort(403);
        }

        $registration->update(['status' => 'cancelled']);

        return back()->with('success', 'Inscription annulée !');
    }
}