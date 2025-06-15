<?php

use App\Http\Controllers\CategoryController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
});

require __DIR__ . '/auth.php';
