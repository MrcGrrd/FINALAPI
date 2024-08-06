<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\AuthController;

// Handle preflight OPTIONS requests
Route::options('/{any}', function () {
    return response()->json(['status' => 'success']);
})->where('any', '.*');

// Login route (no authentication required)
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/approval', [ApprovalController::class, 'index']);
});
