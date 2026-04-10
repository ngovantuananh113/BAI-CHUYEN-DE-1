<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function indexByCourse(Course $course)
    {
        $lessons = $course->lessons()->orderBy('order')->get();
        return view('lessons.index', compact('course', 'lessons'));
    }

    public function create(Request $request)
    {
        $courseId = $request->query('course_id');
        $courses = Course::all();
        return view('lessons.create', compact('courses', 'courseId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'video_url' => 'nullable|url',
            'order' => 'required|integer',
        ]);

        Lesson::create($request->all());

        return redirect()->route('lessons.byCourse', $request->course_id)
            ->with('success', 'Lesson added successfully.');
    }
}
