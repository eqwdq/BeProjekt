<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AdminRegistrationController;
use App\Http\Controllers\AdminLoginController;

// Define API routes or other server-side routes here

// Route all other requests to your Vue application
Route::get('/{any}', function () {
    return view('app');
})->where('any', '^(?!api).*$'); // Exclude 'api' from Vue routes

Route::post('/admin/register', [AdminRegistrationController::class, 'register']);
Route::post('/admin/login', [AdminLoginController::class, 'login']);





