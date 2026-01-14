<?php
use App\Models\Question;
use App\Models\Chapter;
use App\Models\Topic;
use App\Models\Subject;
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
     $data = Topic::with('questions.options')->find(45);
    return view('universal.viewer', [
        'title' => 'JSON Inspector',
        'data'  => $data?->toArray()
    ]);
});
Route::get('/test-viewer3', function () {
     $data = Topic::find(8);
    return view('universal.viewer', [
        'title' => 'JSON Inspector',
        'data'  => $data?->toArray()
    ]);
});




Route::get('/', function () {
    return view('welcome');
});
