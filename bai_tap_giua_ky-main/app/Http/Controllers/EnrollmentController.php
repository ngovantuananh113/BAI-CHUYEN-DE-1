<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Student;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::all();
        $courseId = $request->query('course_id');
        $enrollments = [];
        
        if ($courseId) {
            $enrollments = Enrollment::with('student', 'course')->where('course_id', $courseId)->get();
        }

        return view('enrollments.index', compact('courses', 'enrollments', 'courseId'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('enrollments.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'student_name' => 'required|string|max:255',
            'student_email' => 'required|email|max:255',
        ]);

        $student = Student::firstOrCreate(
            ['email' => $request->student_email],
            ['name' => $request->student_name]
        );

        // Check if already enrolled
        $exists = Enrollment::where('course_id', $request->course_id)
            ->where('student_id', $student->id)
            ->exists();

        if (!$exists) {
            Enrollment::create([
                'course_id' => $request->course_id,
                'student_id' => $student->id,
            ]);
        }

        return redirect()->route('enrollments.index', ['course_id' => $request->course_id])
            ->with('success', 'Student enrolled successfully.');
    }
}
