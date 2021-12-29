<?php

use App\Http\Controllers\PostController;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Show all tasks
 */
Route::get('/', [PostController::class, 'showList']);
/**
 * Add new tasks
 */
Route::post('/task', [PostController::class, 'createTask']);
/**
 * Delete the task
 */
Route::delete('/task/{task}', [PostController::class, 'deleteTask']);