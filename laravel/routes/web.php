<?php

use App\Http\Controllers\CourseViewController;
use App\Http\Controllers\EnrollmentController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Маршруты для курсов
Route::get('/courses', [CourseViewController::class, 'index'])->name('courses.index');
Route::get('/courses/{id}', [CourseViewController::class, 'show'])->name('courses.show');

// Маршрут для записи на курс (только для авторизованных)
Route::post('/courses/{id}/enroll', [EnrollmentController::class, 'store'])
    ->middleware('auth')
    ->name('courses.enroll');

require __DIR__.'/auth.php';