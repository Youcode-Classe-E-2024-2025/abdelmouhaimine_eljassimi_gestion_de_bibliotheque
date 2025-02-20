<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReservationController;


Route::get('admin', [BookController::class, 'admin']);
Route::get('/', [BookController::class, 'index']);
Route::post('DeleteBook', [BookController::class, 'Delete']);
Route::post('EditBook', [BookController::class, 'Edit']);

Route::get('login', [UserController::class, 'showLoginForm']);
Route::post('login', [UserController::class, 'login']);
Route::get('register', [UserController::class, 'showRegistrationForm']);
Route::post('register', [UserController::class, 'register']);
Route::get('logout', [UserController::class, 'logout']);


Route::post('CreateBook', [BookController::class, 'Create']);


Route::get('/reserver/{id}', [ReservationController::class, 'reserve']);
Route::get('/return/{id}', [ReservationController::class, 'cancelReservation']);
