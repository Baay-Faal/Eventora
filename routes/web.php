<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// ========== ROUTES PUBLIQUES ==========
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

// ========== ROUTES AUTHENTIFIÉES ==========
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard (tous les rôles)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profil (tous les rôles - Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ===== ADMIN SEULEMENT =====
    Route::middleware('admin')->group(function () {
        Route::resource('categories', CategoryController::class)->except(['show']);

        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // ===== ADMIN + ORGANIZER SEULEMENT =====
    Route::middleware('organizer')->group(function () {
        Route::get('/my-events', [EventController::class, 'myEvents'])->name('events.my');
        Route::get('/events-create', [EventController::class, 'create'])->name('events.create');
        Route::post('/events-store', [EventController::class, 'store'])->name('events.store');
        Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
        Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
        Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

        Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
        Route::patch('/registrations/{registration}/confirm', [RegistrationController::class, 'confirm'])->name('registrations.confirm');
    });

    // ===== USER (s'inscrire aux événements) =====
    Route::post('/events/{event}/register', [RegistrationController::class, 'store'])->name('registrations.store');
    Route::get('/my-registrations', [RegistrationController::class, 'myRegistrations'])->name('registrations.my');
    Route::patch('/registrations/{registration}/cancel', [RegistrationController::class, 'cancel'])->name('registrations.cancel');
});

require __DIR__ . '/auth.php';