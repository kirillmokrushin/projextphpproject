<?php

use App\Http\Controllers\CourseViewController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ReviewController;
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

// ========== МАРШРУТЫ ДЛЯ КУРСОВ ==========

// Список всех курсов
Route::get('/courses', [CourseViewController::class, 'index'])->name('courses.index');

// Детальная страница курса
Route::get('/courses/{id}', [CourseViewController::class, 'show'])->name('courses.show');

// Запись на курс (только для авторизованных)
Route::post('/courses/{id}/enroll', [EnrollmentController::class, 'store'])
    ->middleware('auth')
    ->name('courses.enroll');

// Отмена записи на курс (только для авторизованных)
Route::delete('/courses/{id}/cancel', function ($id) {
    $enrollment = App\Models\Enrollment::where('student_id', auth()->id())
        ->where('course_id', $id)
        ->first();
    
    if ($enrollment) {
        $enrollment->delete();
        return back()->with('success', 'Вы отменили запись на курс');
    }
    
    return back()->with('error', 'Запись не найдена');
})->middleware('auth')->name('courses.cancel');

// Отзывы на курс (только для авторизованных)
Route::post('/courses/{id}/review', [ReviewController::class, 'store'])
    ->middleware('auth')
    ->name('courses.review');

// ========== СТРАНИЦЫ ПОЛЬЗОВАТЕЛЕЙ ==========

// Страница "Мои курсы" для студента
Route::get('/my-courses', function () {
    $courses = App\Models\Course::whereHas('enrollments', function($q) {
        $q->where('student_id', auth()->id());
    })->get();
    return view('my-courses', compact('courses'));
})->middleware('auth')->name('my-courses');

// Страница ментора "Мои курсы" (управление)
Route::get('/mentor/courses', function () {
    $courses = App\Models\Course::where('mentor_id', auth()->id())->get();
    return view('mentor-courses', compact('courses'));
})->middleware(['auth'])->name('mentor.courses');

require __DIR__.'/auth.php';