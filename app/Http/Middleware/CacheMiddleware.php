<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Ne pas mettre en cache si c'est une requête POST ou si l'utilisateur est connecté
        if ($request->isMethod('GET') && !auth()->check()) {
            $key = 'page_cache_' . sha1($request->fullUrl());

            // Vérifier si la page est en cache
            if (Cache::has($key)) {
                return Cache::get($key);
            }

            $response = $next($request);

            // Mettre en cache seulement les réponses réussies
            if ($response->isSuccessful()) {
                // Cache pour 1 heure
                Cache::put($key, $response, now()->addHour());
            }

            return $response;
        }

        return $next($request);
    }
}
