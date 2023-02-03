<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\dashboard\DashboardController;

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
    Route::get('/create', [BookController::class, 'create']);
    Route::post('/add', [BookController::class, 'store']);

    Route::get('/edit/{book}', [BookController::class, 'edit']);
    Route::post('/update/{book}', [BookController::class, 'update']);
    Route::delete('/delete/{book}', [BookController::class, 'destroy']);
});

Route::group(['prefix' => '/publisher'], function(){
    Route::get('/all', [PublisherController::class, 'index']);
    Route::get('/detail/{publisher:id}', [PublisherController::class, 'show']);
});

// Route::get('/login', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register/add-user', [RegisterController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::group(['prefix' => '/dashboard'], function(){
        Route::get('/home', function () {
            return view('/home');
        })->middleware('auth');
    
        Route::group(['prefix' => '/book'], function(){
            Route::get('/all', [DashboardController::class, 'index'])->middleware('auth');
            Route::get('/detail/{book:id}', [DashboardController::class, 'show'])->middleware('auth');
            Route::get('/create', [DashboardController::class, 'create'])->middleware('auth');
            Route::post('/add', [DashboardController::class, 'store'])->middleware('auth');
            Route::get('/edit/{book}', [DashboardController::class, 'edit'])->middleware('auth');
            Route::post('/update/{book}', [DashboardController::class, 'update'])->middleware('auth');
            Route::delete('/delete/{book}', [DashboardController::class, 'destroy'])->middleware('auth');
        });
});