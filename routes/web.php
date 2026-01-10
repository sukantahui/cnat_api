<?php
use App\Models\Question;
use App\Models\Chapter;
use App\Models\Topic;
use Illuminate\Support\Facades\Route;
Route::get('/test-tinker', function () {
    return Topic::find(40)->questions;
});

Route::get('/', function () {
    return view('welcome');
});
