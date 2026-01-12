<?php
use App\Models\Question;
use App\Models\Chapter;
use App\Models\Topic;
use Illuminate\Support\Facades\Route;
Route::get('/test-tinker', function () {
    return Topic::find(40)->questions;
});

Route::get('/test-viewer', function () {

    //  $data = \App\Models\Topic::with('questions.options')->find(40);
     $data = \App\Models\Topic::all();

    return view('universal.viewer', [
        'title' => 'JSON Inspector',
        'data'  => $data?->toArray()
    ]);
});
Route::get('/test-viewer2', function () {
<<<<<<< HEAD
     $data = Topic::with('questions.options')->find(45);
=======

    //  $data = \App\Models\Topic::with('questions.options')->find(40);
     $data = Topic::find(50)->questions;
>>>>>>> 8c847a163db04587e7ff403743d109a2d2dd9604

    return view('universal.viewer', [
        'title' => 'JSON Inspector',
        'data'  => $data?->toArray()
    ]);
});

Route::get('/', function () {
    return view('welcome');
});
