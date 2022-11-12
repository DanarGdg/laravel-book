<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PublisherController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return  view('home');
});

Route::get('/about', function () {
    return  view('about');
});

Route::group(['prefix' => '/book'], function(){
    Route::get('/all', [BookController::class, 'index']);
    Route::get('/detail/{book:id}', [BookController::class, 'show']);
});

Route::group(['prefix' => '/publisher'], function(){
    Route::get('/all', [PublisherController::class, 'index']);
    Route::get('/detail/{publisher:id}', [PublisherController::class, 'show']);
});