<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CalendarController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ChatbotController;
use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::controller(AuthController::class)->group(function () {
    Route::get('/auth', 'index')->middleware('auth:sanctum');
    Route::post('/auth/register', 'register');
    Route::post('/auth/login', 'login');
    Route::post('/auth/logout', 'logout')->middleware('auth:sanctum');
    Route::put('/auth/update-profile', 'updateProfile')->middleware('auth:sanctum');
    Route::put('/auth/change-password', 'changePassword')->middleware('auth:sanctum');
});

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::apiResource('users', UserController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('tasks', TaskController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::post('/chatbot', [ChatbotController::class, 'chatbot']);
    Route::get('/calendar', [CalendarController::class, 'calendar']);
});
