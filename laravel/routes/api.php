<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\EnrollmentController;
use App\Http\Controllers\Api\ReviewController;

// API маршруты
Route::apiResource('courses', CourseController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('enrollments', EnrollmentController::class);
Route::apiResource('reviews', ReviewController::class);