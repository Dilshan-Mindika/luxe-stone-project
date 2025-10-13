<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Auth; // <-- ADDED
use App\Http\Controllers\Admin\ServiceCrudController; // <-- ADDED
use App\Http\Controllers\Admin\PortfolioCrudController; // <-- ADDED

// --- STANDARD DASHBOARD ROUTE (REQUIRED BY BREEZE AUTH) ---
// This acts as a routing gate, redirecting the Admin (ID 1) to the secure path.
Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->id === 1) {
        // Admin user is redirected to the custom admin dashboard
        return redirect()->route('admin.dashboard');
    }
    // Regular user sees the default dashboard view
    return view('dashboard'); 
})->middleware(['auth', 'verified'])->name('dashboard');
// -----------------------------------------------------------


// --- Frontend Routes ---
Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/portfolio', [FrontController::class, 'portfolio'])->name('portfolio');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');

// Dynamic Service Page
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

// --- Admin Routes (Protected area) ---
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Admin Dashboard (Points to your custom admin view)
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); 
    })->name('dashboard');

    // Services CRUD 
    Route::resource('services', ServiceCrudController::class);

    // Portfolio CRUD
    Route::resource('portfolio', PortfolioCrudController::class);
});

require __DIR__.'/auth.php';