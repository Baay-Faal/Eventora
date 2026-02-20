<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OrganizerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->user()->isAdmin() && !auth()->user()->isOrganizer()) {
            abort(403, 'Accès interdit. Vous n\'êtes pas organisateur.');
        }

        return $next($request);
    }
}