<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LessonController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('courses', CourseController::class);
Route::post('courses/{id}/restore', [CourseController::class, 'restore'])->name('courses.restore');

Route::resource('lessons', LessonController::class);
Route::get('courses/{course}/lessons', [LessonController::class, 'indexByCourse'])->name('lessons.byCourse');

Route::resource('enrollments', EnrollmentController::class);
