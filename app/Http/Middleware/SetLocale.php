<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route('locale');

        if (!in_array($locale, ['en', 'pt', 'es'])) {

            $route = $request->route();

            return redirect()->route($route->getName(),
                array_merge($route->parameters(),
                    ['locale' => 'en']
                )
            );
        }

        App::setLocale($locale);

        URL::defaults([
            'locale' => $locale
        ]);

        return $next($request);
    }
}
