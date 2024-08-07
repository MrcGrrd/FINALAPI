<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/approval', [ApprovalController::class, 'index']);
});
