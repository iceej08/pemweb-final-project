<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DiaryController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecapController;



// // Redirect root ke login
Route::get('/', fn() => view('landing'))->name('landing');

// Tampilkan halaman login
Route::get('/login', fn() => view('masuk.login'))->name('login');

// Tampilkan form signup
Route::get('/signup', [AuthController::class, 'showSignupForm'])->name('signup');

// Proses signup
Route::post('/signup', [AuthController::class, 'register']);

// Proses login
Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman home (hanya bisa diakses jika sudah login)
Route::get('/home', function () {
    if (!Session::has('user_moodiary')) return redirect('/login');
    return view('home');
});
Route::get('/addDiary', function () {
    if (!Session::has('user_moodiary')) return redirect('/login');
    return view('add');
});
Route::get('/recap', function () {
    if (!Session::has('user_moodiary')) return redirect('/login');
    return view('recap');
});
Route::get('/chart', function () {
    if (!Session::has('user_moodiary')) return redirect('/login');
    return view('chart');
});
Route::get('/calendar', function () {
    if (!Session::has('user_moodiary')) return redirect('/login');
    return view('calendar.index');
});

Route::get('/addDiary', [DiaryController::class, 'create'])->name('diary.create');
Route::post('/addDiary', [DiaryController::class, 'store'])->name('diary.store');
Route::get('/recap', [DiaryController::class, 'recap'])->name('diary.recap');
Route::get('/chart', [ChartController::class, 'index'])->name('chart');
Route::get('/calendar', [CalenderController::class, 'index'])->name('calendar');
Route::get('/recap-detail/{id}', [RecapController::class, 'show'])->name('recap.show');