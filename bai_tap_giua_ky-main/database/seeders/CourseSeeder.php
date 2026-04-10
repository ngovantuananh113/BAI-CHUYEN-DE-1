<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Student;
use App\Models\Enrollment;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Sample Courses
        $courses = [
            [
                'name' => 'Laravel Masterclass 2026',
                'price' => 99.99,
                'description' => 'Trở thành chuyên gia Laravel từ con số 0.',
                'status' => 'published',
            ],
            [
                'name' => 'React & Next.js Pro',
                'price' => 79.50,
                'description' => 'Xây dựng ứng dụng web hiện đại với React.',
                'status' => 'published',
            ],
            [
                'name' => 'Vue.js for Beginners',
                'price' => 45.00,
                'description' => 'Khóa học cơ bản về Vue.',
                'status' => 'draft',
            ],
            [
                'name' => 'Fullstack Web Development',
                'price' => 150.00,
                'description' => 'Toàn bộ lộ trình Backend và Frontend.',
                'status' => 'published',
            ],
        ];

        foreach ($courses as $c) {
            $course = Course::create([
                'name' => $c['name'],
                'slug' => Str::slug($c['name']) . '-' . uniqid(),
                'price' => $c['price'],
                'description' => $c['description'],
                'status' => $c['status'],
            ]);

            // 2. Create Sample Lessons for each course
            for ($i = 1; $i <= 3; $i++) {
                Lesson::create([
                    'course_id' => $course->id,
                    'title' => "Bài $i: Hướng dẫn cơ bản về " . $c['name'],
                    'content' => "Nội dung chi tiết của bài số $i cho khóa học " . $c['name'],
                    'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                    'order' => $i,
                ]);
            }
        }

        // 3. Create Sample Students
        $students = [
            ['name' => 'Nguyễn Văn A', 'email' => 'vana@gmail.com'],
            ['name' => 'Trần Thị B', 'email' => 'thib@yahoo.com'],
            ['name' => 'Lê Văn C', 'email' => 'vanc@outlook.com'],
        ];

        foreach ($students as $s) {
            $student = Student::create($s);

            // 4. Enroll students in random published courses
            $publishedCourses = Course::where('status', 'published')->get();
            foreach ($publishedCourses->random(2) as $course) {
                Enrollment::create([
                    'course_id' => $course->id,
                    'student_id' => $student->id,
                ]);
            }
        }
    }
}
