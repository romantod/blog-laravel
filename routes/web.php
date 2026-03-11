<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [HelloController::class, 'index']);

Route::get('/user/{id}', [HelloController::class, 'showUser']); // {id} - параметр из URL

Route::get('/users/create', [HelloController::class, 'create']);

Route::get('/posts/create', [PostController::class, 'create']);

Route::post('/users', [HelloController::class, 'store']);

Route::post('/posts', [PostController::class, 'store']);

Route::get('/users', [HelloController::class, 'users']);

Route::get('/users/{id}', [HelloController::class, 'showOneUser']);

Route::get('/users/{id}/edit', [HelloController::class, 'edit']);

Route::get('/posts/{id}/edit', [PostController::class, 'edit']);

Route::put('/users/{id}', [HelloController::class, 'update']);

Route::put('/posts/{id}', [PostController::class, 'update']);

Route::delete('users/{id}', [HelloController::class, 'destroy']);

Route::delete('posts/{id}', [PostController::class, 'destroy']);

Route::get('/users/{id}/posts', [HelloController::class, 'userPosts']);

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/{id}', [PostController::class, 'PostAuthor']);