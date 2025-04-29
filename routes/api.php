<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your mobile app.
| These routes are stateless and prefixed with "/api" by default.
|
*/

// 1. Login endpoint (app calls this to authenticate)
Route::post('/login', [AuthController::class, 'login']);

// 2. All routes below require the user to be authenticated.
//    You can swap out 'auth:api' for 'auth:sanctum' or Passport middleware as needed.
Route::middleware('auth:api')->group(function () {

    // Logout (optional, if you issue tokens you may revoke them here)
    Route::post('/logout', [AuthController::class, 'logout']);

    // 3. List all contacts
    Route::get('/contacts', [ContactController::class, 'index']);

    // 4. Search contacts by name, phone or email
    //    e.g. GET /api/contacts/search?term=John
    Route::get('/contacts/search', [ContactController::class, 'search']);

    // 5. Create a new contact
    Route::post('/contacts', [ContactController::class, 'store']);

    // 6. Update an existing contact
    Route::put('/contacts/{contact}', [ContactController::class, 'update']);
});
