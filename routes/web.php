<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CategoryProductController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Product
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::post('/product/delete', [ProductController::class, 'delete'])->name('product.delete');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');

    //Category Product
    Route::get('/category', [CategoryProductController::class, 'index'])->name('category.index');
    Route::post('/category/store', [CategoryProductController::class, 'store'])->name('category.store');
    Route::post('/category/delete', [CategoryProductController::class, 'delete'])->name('category.delete');
    Route::post('/category/update/{id}', [CategoryProductController::class, 'update'])->name('category.update');

    //Reservations
    Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation.index');

});

//Reservations
Route::post('/reservation/store', [ReservationController::class, 'store'])->name('reservation.store');

require __DIR__.'/auth.php';
