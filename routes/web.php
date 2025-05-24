<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DiaryController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;



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
Route::get('/logout', [AuthController::class, 'logout']);

// Halaman home (hanya bisa diakses jika sudah login)
Route::get('/home', function () {
    if (!Session::has('user')) return redirect('/login');
    return view('home');
});

Route::get('/addDiary', function(){
    return view('add');
});

Route::get('/calender', function(){
    return view('calender.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/addDiary', [DiaryController::class, 'create'])->name('diary.create');
    Route::post('/addDiary', [DiaryController::class, 'store'])->name('diary.store');
    Route::get('/recap', [DiaryController::class, 'recap'])->name('diary.recap');
    Route::get('/chart', [ChartController::class, 'index'])->name('chart');
    Route::get('/calender', [CalenderController::class, 'index'])->name('calender');
});

// Route::get('/recap', function () {
//     return view(view: 'recap');
// });

Route::get('/recap-detail/{id}', function ($id) {
    return view('recap-detail', ['id' => $id]);
});

Route::get('/chart', [ChartController::class, 'index'])->name('chart');