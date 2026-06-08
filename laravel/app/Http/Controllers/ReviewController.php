<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $courseId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:3'
        ]);

        $enrolled = \App\Models\Enrollment::where('student_id', auth()->id())
            ->where('course_id', $courseId)
            ->exists();

        if (!$enrolled) {
            return back()->with('error', 'Вы можете оставить отзыв только после записи на курс');
        }

        Review::create([
            'course_id' => $courseId,
            'student_id' => auth()->id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Спасибо за отзыв!');
    }
}