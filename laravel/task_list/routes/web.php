<?php

use App\Http\Controllers\PostController;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Show all Tasks List
 */
Route::get('/', [PostController::class, 'showPostList']);

/**
 * Add new Tasks
 */
Route::post('/task', [PostController::class, 'createPostList']);

/**
 * Delete the Tasks
 */
Route::delete('/task/{task}', [PostController::class, 'deletePostList']);
