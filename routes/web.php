<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [FrontController::class, 'index'])->name('home');


// Ajax ile içerik getirme
Route::get('/get-content/{slug}', [FrontController::class, 'getContent'])->name('get-content');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::get('/{slug}', [FrontController::class, 'showPage'])->name('showPage');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Pages
    // Page listesini göster
    Route::get('/pages', [AdminController::class, 'index'])->name('pages.index');
    // Düzenleme formu
    Route::get('/pages/{page}/edit', [AdminController::class, 'edit'])->name('pages.edit');
    // Güncelleme
    Route::put('/pages/{page}', [AdminController::class, 'update'])->name('pages.update');


    // Settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingsController::class, 'update'])->name('settings.update');
});
