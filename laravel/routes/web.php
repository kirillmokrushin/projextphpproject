<?php

use App\Http\Controllers\CourseViewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Маршруты для курсов
Route::get('/courses', [CourseViewController::class, 'index'])->name('courses.index');
Route::get('/courses/{id}', [CourseViewController::class, 'show'])->name('courses.show');

// ТЕСТОВЫЙ МАРШРУТ
Route::get('/test', function () {
    $courses = App\Models\Course::all();
    return view('test', ['courses' => $courses]);
});

require __DIR__.'/auth.php';