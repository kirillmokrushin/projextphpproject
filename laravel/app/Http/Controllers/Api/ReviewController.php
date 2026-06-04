<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return response()->json(Review::with('student', 'course')->paginate(15));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'student_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        $review = Review::create($validated);
        return response()->json($review, 201);
    }

    public function show(Review $review)
    {
        return response()->json($review->load('student', 'course'));
    }

    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'rating' => 'integer|min:1|max:5',
            'comment' => 'string',
        ]);

        $review->update($validated);
        return response()->json($review);
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return response()->json(null, 204);
    }
}