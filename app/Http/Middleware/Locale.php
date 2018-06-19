<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use Illuminate\Http\Request;

/**
 * Sets app locale to user-agent-requested locale if valid.
 */
class Locale
{
    public function handle(Request $request, Closure $next) {
        app()->setLocale(
            $request->getPreferredLanguage(
                Config::get('app.locales_supported')
            )
        );

        return $next($request);
    }
}
