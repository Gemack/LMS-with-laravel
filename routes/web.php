<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;


Route::get('/', [homeController::class, 'home']);
Route::get('/about', [homeController::class, 'about']);
Route::get('/courses', [homeController::class, 'courses']);
Route::get('/login', [homeController::class, 'login']);

// User registration page
Route::get('/register',[AuthController::class, 'create']);

//  student registration form

Route::post('/users',[AuthController::class, 'store']);

Route::get('/login_page', [AuthController::class, 'loginform']);
Route::post('/login',[AuthController::class, 'login']);

// logout student

Route::post('/logout', [AuthController::class, 'logout']);