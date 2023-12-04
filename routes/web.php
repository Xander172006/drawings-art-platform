<?php

use App\Http\Controllers\MembershipController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// controllers
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;



Route::middleware('auth')->group(function () {
    // webpages routes
    Route::get('/', function () {
        return Inertia::render('Home', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    })->name('home');

    Route::get('/search', [SearchController::class, 'index'])->name('search');

    // update routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Memberships page
    Route::get('/membership/{membershipName}', [MembershipController::class, 'acquire'])->name('membership.acquire');
});

require __DIR__.'/auth.php';
