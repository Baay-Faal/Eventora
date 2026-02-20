<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Liste des organisateurs
    public function index()
    {
        $organizers = User::where('role', 'organizer')->latest()->get();
        return view('users.index', compact('organizers'));
    }

    // Formulaire de création
    public function create()
    {
        return view('users.create');
    }

    // Enregistrer un organisateur
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'organizer',
            'phone' => $request->phone,
        ]);

        return redirect()->route('users.index')
                         ->with('success', 'Organisateur créé avec succès !');
    }

    // Modifier un organisateur
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Mettre à jour
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')
                         ->with('success', 'Organisateur modifié avec succès !');
    }

    // Supprimer
    public function destroy(User $user)
    {
        if ($user->isAdmin()) {
            return back()->with('error', 'Impossible de supprimer un admin !');
        }

        $user->delete();

        return redirect()->route('users.index')
                         ->with('success', 'Organisateur supprimé avec succès !');
    }
}