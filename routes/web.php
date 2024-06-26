<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\PageController::class, 'home']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('repositories', App\Http\Controllers\RepositoryController::class)
    ->middleware('auth');
