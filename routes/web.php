<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollController;


Route::get('/', [homeController::class, 'home']);
Route::get('/about', [homeController::class, 'about']);

// User registration page and user registration 
Route::get('/register',[AuthController::class, 'create']);
Route::post('/users',[AuthController::class, 'store']);

// logout user
Route::post('/logout', [AuthController::class, 'logout']);

// Login user
Route::get('/login_page', [AuthController::class, 'loginform']);
Route::post('/login',[AuthController::class, 'login']);

// Update user profile
Route::get('/update', [AuthController::class, 'update']);
Route::put('/update/user/{id}', [AuthController::class, 'updateUser']);

//  Adding courses
Route::get('/course', [CourseController::class, 'index']);
Route::get('/course_form',[CourseController::class, 'courses']);
Route::post('/add_course', [CourseController::class, 'store']);

//  enrolling in a course by users
Route::post('/course/{course}/enroll',[EnrollController::class, 'store']);


// ============= TO DO NEXT -=======================

//  implement middlewares for authentication and protected route
//  Create admin user authorized to add course