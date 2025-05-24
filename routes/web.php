<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/landing', function(){
    return view('landing');
});

