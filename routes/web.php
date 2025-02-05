<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CouncilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\Admin\PlotController;

// Route for the home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Map routes
Route::get('/map', [MapController::class, 'showMap'])->name('map');

// Admin routes for managing plots
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/plots/create', [PlotController::class, 'create'])->name('plots.create');
    Route::post('/plots', [PlotController::class, 'store'])->name('plots.store');
    Route::resource('plots', PlotController::class)->except(['create', 'store']);
});

// Council and District routes
Route::resource('councils', CouncilController::class)->middleware(['auth']);
Route::resource('districts', DistrictController::class)->middleware(['auth']);

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authentication routes
require __DIR__ . '/auth.php';
