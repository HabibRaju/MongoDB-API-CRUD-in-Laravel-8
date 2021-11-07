<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

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
Route::get('students', [StudentController::class, 'index']);
Route::post('student-create', [StudentController::class, 'store']);
Route::post('user-create', [UserController::class, 'store']);
Route::get('student-show/{id}', [StudentController::class, 'show']);
Route::post('student-update', [StudentController::class, 'update']);
Route::post('student-delete', [StudentController::class, 'destroy']);

// Route::post('register', [PassportAuthController::class, 'register']);
// Route::post('login', [PassportAuthController::class, 'login']);

// Route::middleware('auth:api')->group(function () {
//     Route::resource('posts', PostController::class);
//     Route::get('logout', [PassportAuthController::class, 'logout']);
// });