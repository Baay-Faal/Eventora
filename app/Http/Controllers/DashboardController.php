<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            // Dashboard Admin
            $data = [
                'totalEvents' => Event::count(),
                'totalCategories' => Category::count(),
                'totalUsers' => User::count(),
                'totalRegistrations' => Registration::count(),
                'recentEvents' => Event::latest()->take(5)->get(),
                'recentRegistrations' => Registration::with(['user', 'event'])->latest()->take(5)->get(),
            ];
            return view('dashboard.admin', $data);

        } elseif ($user->isOrganizer()) {
            // Dashboard Organizer
            $data = [
                'myEvents' => $user->events()->latest()->take(5)->get(),
                'totalMyEvents' => $user->events()->count(),
                'publishedEvents' => $user->events()->where('status', 'published')->count(),
                'draftEvents' => $user->events()->where('status', 'draft')->count(),
                'totalRegistrations' => Registration::whereIn('event_id', $user->events()->pluck('id'))->count(),
            ];
            return view('dashboard.organizer', $data);

        } else {
            // Dashboard User
            $data = [
                'myRegistrations' => $user->registrations()->with('event')->latest()->take(5)->get(),
                'totalRegistrations' => $user->registrations()->count(),
                'confirmedRegistrations' => $user->registrations()->where('status', 'confirmed')->count(),
                'pendingRegistrations' => $user->registrations()->where('status', 'pending')->count(),
            ];
            return view('dashboard.user', $data);
        }
    }
}