<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function store(Request $request, $courseId)
    {
        $course = Course::findOrFail($courseId);
        
        // Проверяем, не записан ли уже пользователь
        $exists = Enrollment::where('student_id', auth()->id())
            ->where('course_id', $courseId)
            ->exists();
            
        if ($exists) {
            return back()->with('error', 'Вы уже записаны на этот курс');
        }
        
        Enrollment::create([
            'student_id' => auth()->id(),
            'course_id' => $courseId,
            'status' => 'pending'
        ]);
        
        return back()->with('success', 'Вы успешно записались на курс!');
    }
}