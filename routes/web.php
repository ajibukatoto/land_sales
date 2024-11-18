<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;

// routes/web.php

 // Make sure to import the HomeController
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CouncilController;
use App\Http\Controllers\ProfileController;

Route::get('/map', [MapController::class, 'showMap'])->name('map');
Route::resource('councils', CouncilController::class);
Route::resource('districts', \App\Http\Controllers\DistrictController::class);
// Repeat for each entity

// Route for the home page
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::resource('councils', CouncilController::class);



Route::get('/', function () {
    return view('home');
});

Route::resource('councils', CouncilController::class)->middleware(['auth']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
