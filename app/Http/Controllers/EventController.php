<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    // Liste publique des événements
    public function index()
    {
        $events = Event::where('status', 'published')
                       ->with(['category', 'user'])
                       ->latest()
                       ->paginate(9);

        $categories = Category::all();

        return view('events.index', compact('events', 'categories'));
    }

    // Détail d'un événement
    public function show(Event $event)
    {
        $event->load(['category', 'user', 'registrations']);
        return view('events.show', compact('event'));
    }

    // Mes événements (Organizer)
    public function myEvents()
    {
        $events = auth()->user()->events()->with('category')->latest()->get();
        return view('events.my-events', compact('events'));
    }

    // Formulaire de création
    public function create()
    {
        $categories = Category::all();
        return view('events.create', compact('categories'));
    }

    // Enregistrer un événement
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'date_start' => 'required|date|after:today',
            'date_end' => 'required|date|after_or_equal:date_start',
            'time_start' => 'required',
            'time_end' => 'required',
            'max_participants' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        Event::create($data);

        return redirect()->route('events.my')
                         ->with('success', 'Événement créé avec succès !');
    }

    // Formulaire de modification
    public function edit(Event $event)
    {
        // Vérifier que l'utilisateur est le propriétaire
        if ($event->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        $categories = Category::all();
        return view('events.edit', compact('event', 'categories'));
    }

    // Mettre à jour un événement
    public function update(Request $request, Event $event)
    {
        if ($event->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
            'time_start' => 'required',
            'time_end' => 'required',
            'max_participants' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published,cancelled',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($data);

        return redirect()->route('events.my')
                         ->with('success', 'Événement modifié avec succès !');
    }

    // Supprimer un événement
    public function destroy(Event $event)
    {
        if ($event->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403);
        }

        $event->delete();

        return redirect()->route('events.my')
                         ->with('success', 'Événement supprimé avec succès !');
    }
}