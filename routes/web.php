<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/users/create', [UserController::class, 'create']);

Route::get('/posts/create', [PostController::class, 'create']);

Route::get('/users/{user}/edit', [UserController::class, 'edit']);

Route::get('/posts/{post}/edit', [PostController::class, 'edit']);

Route::get('/users/{user}/posts', [UserController::class, 'userPosts']);

Route::get('/hello', [UserController::class, 'index']);

Route::post('/users', [UserController::class, 'store']);

Route::post('/posts', [PostController::class, 'store']);

Route::get('/users', [UserController::class, 'users']);

Route::get('/posts', [PostController::class, 'index']);

Route::get('/users/{user}', [UserController::class, 'showOneUser']);

Route::get('/posts/{post}', [PostController::class, 'show']);

Route::put('/users/{user}', [UserController::class, 'update']);

Route::put('/posts/{post}', [PostController::class, 'update']);

Route::delete('users/{user}', [UserController::class, 'destroy']);

Route::delete('posts/{post}', [PostController::class, 'destroy']);