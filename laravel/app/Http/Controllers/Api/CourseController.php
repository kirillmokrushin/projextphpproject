<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // GET /api/courses - список всех курсов
    public function index()
    {
        return response()->json(Course::with('category', 'mentor')->paginate(15));
    }

    // POST /api/courses - создать курс
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'numeric|min:0',
            'duration' => 'nullable|integer',
            'category_id' => 'required|exists:categories,id',
            'mentor_id' => 'required|exists:users,id',
        ]);

        $course = Course::create($validated);
        return response()->json($course, 201);
    }

    // GET /api/courses/{id} - показать один курс
    public function show(Course $course)
    {
        return response()->json($course->load('category', 'mentor', 'enrollments'));
    }

    // PUT/PATCH /api/courses/{id} - обновить курс
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'string|max:255',
            'description' => 'string',
            'price' => 'numeric|min:0',
            'duration' => 'nullable|integer',
            'category_id' => 'exists:categories,id',
        ]);

        $course->update($validated);
        return response()->json($course);
    }

    // DELETE /api/courses/{id} - удалить курс
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(null, 204);
    }
}
