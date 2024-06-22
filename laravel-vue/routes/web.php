<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AdminRegistrationController;
<<<<<<< HEAD
=======
use App\Http\Controllers\UserRegistrationController;
>>>>>>> 9f2fcc12450a4cd0fc08cde55b637ef5ec068678
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SponsorController;
<<<<<<< HEAD
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PageController;
=======
use Illuminate\Support\Facades\Mail;
>>>>>>> 9f2fcc12450a4cd0fc08cde55b637ef5ec068678


Route::get('/{any}', function () {
    return view('app');
})->where('any', '^(?!api).*$');

Route::post('/admin/register', [AdminRegistrationController::class, 'register']);
Route::post('/admin/login', [AdminLoginController::class, 'login']);

<<<<<<< HEAD
Route::get('/api/admin/speakers', [SpeakerController::class, 'index']);
Route::post('/admin/speakers', [SpeakerController::class, 'store']);
Route::put('/api/admin/speakers/{speaker}', [SpeakerController::class, 'update']); 
Route::delete('/admin/speakers/{speaker}', [SpeakerController::class, 'destroy']); 
=======
Route::post('/registracia', [UserRegistrationController::class, 'register']);

Route::get('/api/admin/speakers', [SpeakerController::class, 'index']);
Route::post('/admin/speakers', [SpeakerController::class, 'store']);
Route::put('/api/admin/speakers/{speaker}', [SpeakerController::class, 'update']);
Route::delete('/admin/speakers/{speaker}', [SpeakerController::class, 'destroy']);
>>>>>>> 9f2fcc12450a4cd0fc08cde55b637ef5ec068678
Route::get('/api/admin/speakers/{speaker}', [SpeakerController::class, 'show']);

Route::get('/api/admin/programs', [ProgramController::class, 'index']);
Route::get('/api/admin/programs/{program}', [ProgramController::class, 'show']);
Route::post('/admin/programs', [ProgramController::class, 'store']);
Route::put('/api/admin/programs/{program}', [ProgramController::class, 'update']);
Route::delete('/admin/programs/{program}', [ProgramController::class, 'destroy']);

Route::post('/admin/gallery', [GalleryController::class, 'store']);
Route::get('/api/gallery', [GalleryController::class, 'index']);

Route::post('/admin/sponsors', [SponsorController::class, 'store']);
Route::get('/api/sponsors', [SponsorController::class, 'index']);

<<<<<<< HEAD
Route::post('/admin/reviews', [ReviewController::class, 'store']);
Route::get('api/admin/reviews', [ReviewController::class, 'index']);
Route::get('api/admin/reviews/{review}', [ReviewController::class, 'show']);
Route::put('api/admin/reviews/{review}', [ReviewController::class, 'update']);
Route::delete('/admin/reviews/{review}', [ReviewController::class, 'destroy']);

Route::post('/admin/pages', [PageController::class, 'store']);
Route::get('/api/pages', [PageController::class, 'index']);
Route::get('/api/pages/{page}', [PageController::class, 'show']);
Route::put('api/admin/pages/{page}', [PageController::class, 'update']);
Route::delete('/admin/pages/{page}', [PageController::class, 'destroy']);













=======
Route::get('/send-test-email', function () {
    Mail::raw('This is a test email from Mailtrap!', function ($message) {
        $message->to('danielf0804@gmail.com')
                ->subject('Test Email');
    });

    return 'Test email sent!';
});
>>>>>>> 9f2fcc12450a4cd0fc08cde55b637ef5ec068678
