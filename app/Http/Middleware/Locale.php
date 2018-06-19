<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use Illuminate\Http\Request;

/**
 * Syncs 'locale' session data to requested language, sets app locale to session
 * locale.
 */
class Locale
{
    public function handle(Request $request, Closure $next) {
        app()->setLocale($request->getPreferredLanguage(Config::get('app.locales_supported')));

        return $next($request);
    }
}
