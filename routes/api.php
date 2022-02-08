<?php

use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ValidateLoginController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Login api
Route::post('/login', [ValidateLoginController::class, 'loginValidate']);
Route::post('/reg/new/user', [ValidateLoginController::class, 'registration'])->middleware('jwt.auth');
// Login api

Route::get('/get/projects/list', [ProjectController::class, 'index'])->middleware('jwt.auth');

Route::get('/get/tasks/list', [TaskController::class, 'index'])->middleware('jwt.auth');

Route::get('/get/user/list', [UserController::class, 'index'])->middleware('jwt.auth');
Route::get('/get/user/dashboard', [UserController::class, 'dashboard'])->middleware('jwt.auth');
