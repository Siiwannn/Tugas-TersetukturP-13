<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('pages.home');
});

// Auth routes
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->withoutMiddleware(['csrf']);
Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->withoutMiddleware(['csrf']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::resource('cars', App\Http\Controllers\CarController::class);

// Admin routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/cars', [App\Http\Controllers\CarController::class, 'adminIndex'])->name('admin.cars.index');
    Route::post('/cars/store', [App\Http\Controllers\CarController::class, 'store'])->name('admin.cars.store')->withoutMiddleware(['csrf']);
    Route::get('/cars/edit/{id}', [App\Http\Controllers\CarController::class, 'edit'])->name('admin.cars.edit');
    Route::post('/cars/update/{id}', [App\Http\Controllers\CarController::class, 'update'])->name('admin.cars.update')->withoutMiddleware(['csrf']);
    Route::delete('/cars/delete/{id}', [App\Http\Controllers\CarController::class, 'destroy'])->name('admin.cars.delete')->withoutMiddleware(['csrf']);
});

// Public admin data route (for AJAX) - temporarily without auth for testing
Route::get('/admin/cars/data', [App\Http\Controllers\CarController::class, 'getData'])->name('admin.cars.data');

// PDF report route
Route::get('/admin/cars/pdf', [App\Http\Controllers\CarController::class, 'allPdf'])->name('mobil.all.pdf');

Route::post('/send-feedback', [ContactController::class, 'send'])->name('send.feedback');