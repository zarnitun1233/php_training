<?php

use App\Http\Controllers\Student\StudentApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([], function () {
    Route::get('/students', [StudentApiController::class, 'index']);
    Route::post('/students', [StudentApiController::class, 'store']);
    Route::get('/majors', [StudentApiController::class, 'getMajor']);
    Route::delete('/students/delete/{id}', [StudentApiController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
