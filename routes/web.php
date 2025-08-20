<?php

use App\Http\Controllers\HomeAdmin;
use App\Http\Controllers\ShowcaseController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $title = "";
    return view('welcome', compact('title'));
});

Route::get('/showcase', function () {
    $title = "Showcase - ";
    return view('showcase.index', compact('title'));
})->name('showcase.index');

Route::get('/showcase/detail', function () {
    $title = "Detail Showcase - ";
    return view('showcase.show', compact('title'));
})->name('showcase.show');

Route::get('/quiz', function () {
    $title = "Quiz - ";
    return view('quiz', compact('title'));
})->name('quiz');


Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', function () {
        $title = "Dashboard - ";
        return view('dashboard.index', compact('title'));
    })->name('index');

    Route::resource('team', TeamController::class);
    Route::resource('showcase', ShowcaseController::class);
});

Route::get('/dashboard/shortener', function () {
    $title = "Dashboard Shortener - ";
    return view('dashboard.shortener.index', compact('title'));
})->name('dashboard.shortener.index');

//test websoket
Route::get('/homeadmin', function () {
        broadcastParseValue();
        return view('websoket'); 
    });

Route::get('/test-broadcast', [HomeAdmin::class, 'updateData']);