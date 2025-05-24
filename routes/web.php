<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\DiaryController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/addDiary', function(){
    return view('add');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/addDiary', [DiaryController::class, 'create'])->name('diary.create');
    Route::post('/addDiary', [DiaryController::class, 'store'])->name('diary.store');
});
