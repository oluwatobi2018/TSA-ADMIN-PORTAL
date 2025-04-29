<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Login Settings
    |--------------------------------------------------------------------------
    |
    | This section contains settings for login-related functionality such as
    | session expiration, login attempts, and redirect paths.
    |
    */

    // Redirect path after successful login
    'redirect_after_login' => '/dashboard',

    // Redirect path after logout
    'redirect_after_logout' => '/login',

    // Maximum login attempts before lockout
    'max_login_attempts' => 5,

    // Lockout time (in seconds) after exceeding max login attempts
    'lockout_time' => 300,  // 5 minutes

    // Whether to enable "remember me" functionality
    'remember_me_enabled' => true,

    // Time in seconds that the "remember me" cookie will persist
    'remember_me_duration' => 1209600,  // 2 weeks

    // Login throttling enabled?
    'login_throttling_enabled' => true,

    // Enable or disable user email verification before login
    'email_verification_required' => true,

    // Session lifetime for authenticated users (in minutes)
    'session_lifetime' => 120,  // 2 hours

    // Grace period for session extension (in minutes) before the session expires
    'session_grace_period' => 15,  // 15 minutes

];
