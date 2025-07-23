<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShortLinkController;
use App\Http\Controllers\ShowcaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'makeAdmin']);


Route::post('/showcases', [ShowcaseController::class, 'addShowcase']);
Route::post('/showcases/{showcase_id}', [ShowcaseController::class, 'editShowcase']);
Route::get('/showcases', [ShowcaseController::class, 'showShowcase']);
Route::delete('/showcases/{showcase_id}', [ShowcaseController::class, 'deleteShowcase']);


Route::post('/teams', [TeamController::class, 'addTeam']);
Route::patch('/teams/{team_id}', [TeamController::class, 'editTeam']);
Route::get('/teams', [TeamController::class, 'showTeam']);
Route::delete('/teams/{team_id}', [TeamController::class, 'deleteTeam']);


Route::post('/short-link', [ShortLinkController::class, 'addShortLink']);
Route::get('/short-link-admin', [ShortLinkController::class, 'showShortLinkForAdmin']);
Route::get('/short-link', [ShortLinkController::class, 'showShortLink']);
Route::patch('/short-link/{shortlink_id}', [ShortLinkController::class, 'editShortLink']);
Route::delete('/short-link/{shortlink_id}', [ShortLinkController::class, 'deleteShortLink']);

//harus paling bawah
Route::get('/{back_half}', [ShortLinkController::class, 'visitShortLink']);