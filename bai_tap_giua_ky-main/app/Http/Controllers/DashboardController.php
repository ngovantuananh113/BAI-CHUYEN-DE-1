<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Student;
use App\Models\Enrollment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCourses = Course::count();
        $totalStudents = Student::count();
        $totalRevenue = Course::join('enrollments', 'courses.id', '=', 'enrollments.course_id')->sum('courses.price');
        
        $mostPopularCourse = Course::withCount('enrollments')
            ->orderBy('enrollments_count', 'desc')
            ->first();

        $latestCourses = Course::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalCourses',
            'totalStudents',
            'totalRevenue',
            'mostPopularCourse',
            'latestCourses'
        ));
    }
}
