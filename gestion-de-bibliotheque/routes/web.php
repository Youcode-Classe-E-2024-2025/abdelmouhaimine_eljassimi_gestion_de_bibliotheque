<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;

Route::get('/', function () { return view('welcome');});

Route::get('login', [UserController::class, 'showLoginForm']);
Route::post('login', [UserController::class, 'login']);
Route::get('register', [UserController::class, 'showRegistrationForm']);
Route::post('register', [UserController::class, 'register']);
Route::get('logout', [UserController::class, 'logout']);
