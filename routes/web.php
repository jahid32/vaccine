<?php

use App\Livewire\PatientRegistration;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registration', PatientRegistration::class);

Route::post('/webhook/gform', function () {
    $payload = request()->all();
    logger('Google Form Webhook', $payload);
    return response()->json(['message' => 'Webhook received']);
})->withoutMiddleware([Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
