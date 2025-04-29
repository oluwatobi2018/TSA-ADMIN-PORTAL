<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SanitizeInput
{
    /**
     * Handle an incoming request and sanitize its input.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $input = $request->all();

        $sanitized = array_map(function ($value) {
            if (is_string($value)) {
                // Trim whitespace and remove potential HTML tags
                return trim(strip_tags($value));
            }
            return $value;
        }, $input);

        $request->merge($sanitized);

        return $next($request);
    }
}
