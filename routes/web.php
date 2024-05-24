<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/users', App\Http\Controllers\UserController::class)->except('index','create','store');

Route::resource('/posts', App\Http\Controllers\PostController::class)->except('index','create');

