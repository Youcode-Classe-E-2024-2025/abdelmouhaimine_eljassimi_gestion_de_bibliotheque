<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\loginController;

Route::get('/', function () { return view('welcome');});

Route::get('login', [loginController::class, 'showLoginForm']);
Route::post('login', [loginController::class, 'login']);
Route::get('register', [RegisterController::class, 'showRegistrationForm']);
Route::post('register', [RegisterController::class, 'register']);
