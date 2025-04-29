<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines which origins, methods, and headers are
    | allowed to make requests to your Laravel application.
    |
    */

    'paths' => [
        'api/*',
        'sanctum/csrf-cookie',
    ],

    'allowed_methods' => [
        '*', // Allow all HTTP methods (GET, POST, PUT, DELETE, etc.)
    ],

    'allowed_origins' => [
        '*', // Allow all origins; change to specific domains in production
    ],

    'allowed_origins_patterns' => [
        // Fallback for wildcard patterns, e.g. '*.yourdomain.com'
    ],

    'allowed_headers' => [
        '*', // Allow all headers
    ],

    'exposed_headers' => [
        // Headers you want exposed to the client
    ],

    'max_age' => 0, // How long the results of a preflight request can be cached

    'supports_credentials' => false, // Set true if you need to send cookies/auth credentials
];
