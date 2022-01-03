<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Post\PostController;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Show all Tasks List
 */
Route::get('/', [PostController::class, 'showPostList'])->middleware('auth');

/**
 * Add new Tasks
 */
Route::post('/task', [PostController::class, 'createPostList'])->middleware('auth');

/**
 * Delete the Tasks
 */
Route::delete('/task/{task}', [PostController::class, 'deletePostList'])->middleware('auth');

/**
 * Show Login Form
 */
Route::get('login', [AuthController::class, 'login'])->name('login');

/**
 * Login Account
 */
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');

/**
 * Show Registeration Form
 */
Route::get('registration', [AuthController::class, 'registration'])->name('register');

/**
 * Registering Account
 */
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

/**
 * Logout Account
 */
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
