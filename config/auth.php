<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Authentication Guard
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" that will be used
    | by Laravel. You can change the default guard to any of the guards below.
    |
    */

    'defaults' => [
        'guard' => 'web',  // Default guard for web routes
        'passwords' => 'users',  // Default password reset broker
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Laravel supports multiple authentication guards. Here you can configure
    | different ways to authenticate users for different parts of your app.
    |
    */

    'guards' => [

        'web' => [
            'driver' => 'session',  // Uses session-based authentication for web routes
            'provider' => 'users',  // Tied to the `users` provider
        ],

        'api' => [
            'driver' => 'sanctum',  // Uses Sanctum for API token authentication
            'provider' => 'users',  // Tied to the `users` provider
            'hash' => false,  // We don't need hashing for API tokens
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Providers define how users are retrieved from your database. Laravel
    | supports a variety of ways to retrieve users, such as from the database
    | or from a custom provider.
    |
    */

    'providers' => [

        'users' => [
            'driver' => 'eloquent',  // Uses Eloquent model for authentication
            'model' => App\Models\User::class,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Password Reset Settings
    |--------------------------------------------------------------------------
    |
    | These settings control the password reset functionality. You can define
    | the settings for different password brokers (email, SMS, etc.) used
    | throughout your application.
    |
    */

    'passwords' => [

        'users' => [
            'provider' => 'users',  // Tied to the `users` provider
            'table' => 'password_resets',
            'expire' => 60,  // Password reset token expires after 60 minutes
            'throttle' => 60,  // Limits the number of reset attempts
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify how long each password reset token should be valid. This
    | is the number of minutes that the token will remain valid. The default
    | value is 60 minutes. You can change this if you want the tokens to last longer.
    |
    */

    'reset' => [
        'expire' => 60,
    ],

];
