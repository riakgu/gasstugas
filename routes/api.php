<?php

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

Route::post('/auth/register', [App\Http\Controllers\API\AuthController::class, 'register']);
Route::post('/auth/login', [App\Http\Controllers\API\AuthController::class, 'login']);
Route::post('/auth/logout', [App\Http\Controllers\API\AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::apiResource('users', UserController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('tasks', TaskController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::post('/chatbot', [ChatbotController::class, 'chatbot']);
});
