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
        // Désactivation temporaire du cache pour déboguer
        return $next($request);

        /*
        // Ne pas mettre en cache si :
        // - C'est une requête POST
        // - L'utilisateur est connecté
        // - C'est une requête Livewire
        // - C'est la page d'accueil (qui utilise Livewire)
        // - L'URL contient un paramètre de pagination ou de filtre
        if ($request->isMethod('GET') &&
            !Auth::check() &&
            !$request->hasHeader('X-Livewire') &&
            $request->path() !== '/' &&
            !$request->has('page') &&
            !$request->has('search') &&
            !$request->has('brand') &&
            !$request->has('category') &&
            !$request->has('sortField') &&
            !$request->has('sortDirection')) {

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
        */
    }
}
