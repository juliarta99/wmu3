<?php

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
