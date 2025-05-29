<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecapController;

Route::get('/', fn() => view('landing'))->name('landing');
Route::get('/login', fn() => view('masuk.login'))->name('login');
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth.session')->group(function() {
    Route::get('/home', fn() => view('home'));
    Route::get('/addDiary', [DiaryController::class, 'create'])->name('diary.create');
    Route::post('/addDiary', [DiaryController::class, 'store'])->name('diary.store');
    Route::get('/recap-detail/{id}/edit', [DiaryController::class, 'edit'])->name('diary.edit');
    Route::put('/recap-detail/{id}', [DiaryController::class, 'update'])->name('diary.update');
    Route::get('/recap', [DiaryController::class, 'recap'])->name('diary.recap');
    Route::get('/chart', [ChartController::class, 'index'])->name('chart');
    Route::get('/calendar', [CalenderController::class, 'index'])->name('calendar');
    Route::get('/recap-detail/{id}', [RecapController::class, 'show'])->name('recap.show');
    Route::delete('/recap-detail/{id}', [RecapController::class, 'destroy'])->name('recap.destroy');
});