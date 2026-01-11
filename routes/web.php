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

    //  $data = \App\Models\Topic::with('questions.options')->find(40);
     $data = Topic::find(44)->questions;

    return view('universal.viewer', [
        'title' => 'JSON Inspector',
        'data'  => $data?->toArray()
    ]);
});

Route::get('/', function () {
    return view('welcome');
});
