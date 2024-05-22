<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;

// Define API routes or other server-side routes here

// Route all other requests to your Vue application
Route::get('/{any}', function () {
    return view('app');
})->where('any', '^(?!api).*$'); // Exclude 'api' from Vue routes




