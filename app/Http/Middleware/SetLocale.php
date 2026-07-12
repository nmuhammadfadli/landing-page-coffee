<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->cookie('nayaka_language', 'id');

        if (in_array($locale, ['id', 'en'])) {
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
