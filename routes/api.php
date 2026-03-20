<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/posts', [PostController::class, 'apiIndex']);
Route::get('/posts/{post}', [PostController::class, 'apiShow']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/posts/{post}/tags', [PostController::class, 'apiTags']);

Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'apiIndex']);

Route::post('/posts', [PostController::class, 'apiStore']);

Route::delete('/posts/{post}', [PostController::class, 'apiDestroy']);

Route::put('/posts/{post}', [PostController::class, 'apiUpdate']);