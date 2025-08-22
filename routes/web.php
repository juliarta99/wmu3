<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShortLinkController;
use App\Http\Controllers\ShowcaseController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/showcase', [GuestController::class, 'showcases'])->name('showcase.index');
Route::get('/showcase/{showcase}', [GuestController::class, 'showcase'])->name('showcase.show');
Route::get('/quiz', [GuestController::class, 'quiz'])->name('quiz.index');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        
        Route::resource('team', TeamController::class);
        Route::resource('showcase', ShowcaseController::class);
        Route::resource('shortener', ShortLinkController::class)->parameters(['shortener' => 'short_link']);;
        
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    });
});

Route::get('/{back_half}', [ShortLinkController::class, 'visitShortLink']);