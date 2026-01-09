<?php

use Illuminate\Support\Facades\Route;
Route::get('/test-tinker', function () {
    return \App\Models\Question::whereJsonContains('applicable_to', 'class_9')->get();
});

Route::get('/', function () {
    return view('welcome');
});
