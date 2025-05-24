<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/diary', function () {
    return view(view: 'recap');
});

Route::get('/recap-detail/{id}', function ($id) {
    return view('recap-detail', ['id' => $id]);
});


