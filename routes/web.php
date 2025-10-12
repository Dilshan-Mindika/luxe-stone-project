<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ServiceController;

// --- STANDARD DASHBOARD ROUTE (REQUIRED BY BREEZE AUTH) ---
// This route is the target after login/registration. We direct it to the home page ('/')
// or a simple standard view for non-admin users.
Route::get('/dashboard', function () {
    // If you want all authenticated users to land on the home page:
    return redirect()->route('home'); 
    
    // If you want them to see a simple 'dashboard' view:
    // return view('dashboard'); 

})->middleware(['auth', 'verified'])->name('dashboard');
// -----------------------------------------------------------


// --- Frontend Routes ---
Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/portfolio', [FrontController::class, 'portfolio'])->name('portfolio');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');

// --- Admin Routes (Protected area) ---
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Admin Dashboard (Uses the default Breeze dashboard view)
    Route::get('/dashboard', function () {
        return view('dashboard'); // Use the default Breeze dashboard template for simplicity
    })->name('dashboard'); // NOTE: The full name of this route is 'admin.dashboard'

    // Services CRUD (Uses ServiceCrudController)
    Route::resource('services', App\Http\Controllers\Admin\ServiceCrudController::class);

    // Portfolio CRUD (Uses PortfolioCrudController)
    Route::resource('portfolio', App\Http\Controllers\Admin\PortfolioCrudController::class);
});

// Dynamic Service Page (Loads data based on the slug from the DB)
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

require __DIR__.'/auth.php';