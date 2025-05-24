<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalenderController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/calender', [CalenderController::class, 'index'])->name('calender');