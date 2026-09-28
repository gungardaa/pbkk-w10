<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ResolveTheme
{
    public function handle(Request $request, Closure $next)
    {
        $mode = $request->query('mode');

        if (in_array($mode, ['light', 'dark'], true)) {
            session(['theme' => $mode]);
        }

        // ponytail: session-only persistence; switch to a cookie or user column if theme must survive devices.
        view()->share('theme', session('theme', 'dark'));

        return $next($request);
    }
}
