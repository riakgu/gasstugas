<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::controller(\App\Http\Controllers\HomeController::class)->group(function () {
    Route::get('/home', 'index')->middleware('auth');
});

Route::controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'doLogin')->middleware('guest');
    Route::get('/register', 'register')->name('register')->middleware('guest');
    Route::post('/register', 'doRegister')->middleware('guest');
    Route::post('/logout', 'doLogout')->middleware('auth')->name('logout');
});

Route::controller(\App\Http\Controllers\ChatbotController::class)->group(function () {
    Route::get('/chatbot', 'index')->middleware('auth');
    Route::post('/chatbot', 'chatbot')->middleware('auth');
});

Route::resource('tasks', \App\Http\Controllers\TaskController::class)->middleware('auth');
