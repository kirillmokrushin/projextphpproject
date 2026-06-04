<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        return response()->json(Enrollment::with('student', 'course')->paginate(15));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'status' => 'in:pending,active,completed,cancelled',
        ]);

        $enrollment = Enrollment::create($validated);
        return response()->json($enrollment, 201);
    }

    public function show(Enrollment $enrollment)
    {
        return response()->json($enrollment->load('student', 'course'));
    }

    public function update(Request $request, Enrollment $enrollment)
    {
        $validated = $request->validate([
            'status' => 'in:pending,active,completed,cancelled',
            'completed_at' => 'nullable|date',
        ]);

        $enrollment->update($validated);
        return response()->json($enrollment);
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return response()->json(null, 204);
    }
}