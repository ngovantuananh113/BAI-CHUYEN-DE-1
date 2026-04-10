@extends('layouts.master')

@section('content')
<div class="header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div>
        <h1>Enrollments</h1>
        <p style="color: var(--text-muted);">Manage student registrations</p>
    </div>
    <a href="{{ route('enrollments.create') }}" class="btn btn-primary">
        <i class="fas fa-user-plus"></i> &nbsp; Enroll Student
    </a>
</div>

<div class="card">
    <form action="{{ route('enrollments.index') }}" method="GET" style="display: flex; gap: 1rem; align-items: flex-end;">
        <div class="form-group" style="flex: 1; margin-bottom: 0;">
            <label class="form-label">Select Course to View Students</label>
            <select name="course_id" class="form-control" onchange="this.form.submit()">
                <option value="">-- Choose Course --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $courseId == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-secondary">Load</button>
    </form>
</div>

@if($courseId)
<div class="card">
    <div class="card-title">Students Enrolled in this Course</div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Enrolled At</th>
                </tr>
            </thead>
            <tbody>
                @forelse($enrollments as $enrollment)
                <tr>
                    <td>{{ $enrollment->student->name }}</td>
                    <td>{{ $enrollment->student->email }}</td>
                    <td>{{ $enrollment->created_at->format('M d, Y') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" style="text-align: center; padding: 2rem; color: var(--text-muted);">No students enrolled in this course yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div style="margin-top: 1rem; font-weight: bold;">
        Total Students: {{ count($enrollments) }}
    </div>
</div>
@else
<div class="card" style="text-align: center; padding: 3rem; color: var(--text-muted);">
    <i class="fas fa-info-circle" style="font-size: 2rem; margin-bottom: 1rem; display: block;"></i>
    Please select a course to view the enrollment list.
</div>
@endif
@endsection
