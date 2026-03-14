<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});



Route::resource('posts', PostController::class);

Route::get('/users/{user}/latest-posts', [UserController::class, 'userLatestPosts']);

Route::resource('users', UserController::class);

Route::get('/users/{user}/posts', [UserController::class, 'userPosts']);



