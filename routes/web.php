<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollController;

Route::get('/', [homeController::class, 'home']);
Route::get('/about', [homeController::class, 'about']);






// User registration page
Route::get('/register',[AuthController::class, 'create']);

// logout student

Route::post('/logout', [AuthController::class, 'logout']);

//  student registration form

Route::post('/users',[AuthController::class, 'store']);

Route::get('/login_page', [AuthController::class, 'loginform']);
Route::post('/login',[AuthController::class, 'login']);
// Update user profile
Route::get('/update', [AuthController::class, 'update']);
Route::put('/update/user/{id}', [AuthController::class, 'updateUser']);


Route::get('/course', [CourseController::class, 'index']);
Route::get('/course_form',[CourseController::class, 'courses']);
Route::post('/add_course', [CourseController::class, 'store']);

Route::post('/course/{id}/enroll',[EnrollController::class, 'store']);