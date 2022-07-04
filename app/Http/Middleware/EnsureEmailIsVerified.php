<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified as BaseMiddleware;
use Illuminate\Http\Request;

class EnsureEmailIsVerified extends BaseMiddleware
{
    public function handle($request, Closure $next, $redirectToRoute = null)
    {
        if ($request->route()->getName() === 'filament.asset') {
            return $next($request);
        }

        return parent::handle($request, $next, $redirectToRoute);
    }
}
