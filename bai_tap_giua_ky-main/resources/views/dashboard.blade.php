@extends('layouts.master')

@section('content')
<div class="header" style="margin-bottom: 2rem;">
    <h1>Dashboard</h1>
    <p style="color: var(--text-muted);">Overview of your Course Management System</p>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-label">Total Courses</div>
        <div class="stat-value">{{ $totalCourses }}</div>
    </div>
    <div class="stat-card" style="border-left-color: var(--success);">
        <div class="stat-label">Total Students</div>
        <div class="stat-value">{{ $totalStudents }}</div>
    </div>
    <div class="stat-card" style="border-left-color: var(--warning);">
        <div class="stat-label">Total Revenue</div>
        <div class="stat-value">${{ number_format($totalRevenue, 2) }}</div>
    </div>
</div>

<div class="stats-grid" style="grid-template-columns: 2fr 1fr;">
    <div class="card">
        <div class="card-title">Latest Courses</div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($latestCourses as $course)
                    <tr>
                        <td>{{ $course->name }}</td>
                        <td>${{ number_format($course->price, 2) }}</td>
                        <td>
                            <span class="badge badge-{{ $course->status }}">
                                {{ ucfirst($course->status) }}
                            </span>
                        </td>
                        <td>{{ $course->created_at->format('M d, Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-title">Popular Course</div>
        @if($mostPopularCourse)
            <div style="text-align: center; padding: 1rem;">
                <h3 style="margin-bottom: 0.5rem;">{{ $mostPopularCourse->name }}</h3>
                <p style="font-size: 2rem; font-weight: bold; color: var(--primary);">
                    {{ $mostPopularCourse->enrollments_count }}
                </p>
                <p style="color: var(--text-muted);">Students Enrolled</p>
            </div>
        @else
            <p style="text-align: center; color: var(--text-muted); padding: 1rem;">No enrollments yet.</p>
        @endif
    </div>
</div>
@endsection
