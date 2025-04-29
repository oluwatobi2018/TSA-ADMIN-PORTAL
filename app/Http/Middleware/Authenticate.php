<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // If the request expects JSON (API), don't redirect — just return 401
        if ($request->expectsJson()) {
            return null;
        }

        // For web users, redirect to login page
        return route('login');
    }
}
