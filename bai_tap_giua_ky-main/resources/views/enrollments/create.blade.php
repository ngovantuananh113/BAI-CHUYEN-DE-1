@extends('layouts.master')

@section('content')
<div class="header" style="margin-bottom: 2rem;">
    <h1>Enroll Student</h1>
    <p style="color: var(--text-muted);">Register a student to a course</p>
</div>

<div class="card" style="max-width: 600px;">
    <form action="{{ route('enrollments.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label class="form-label">Select Course</label>
            <select name="course_id" class="form-control" required>
                <option value="">-- Choose Course --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Student Name</label>
            <input type="text" name="student_name" class="form-control" placeholder="John Doe" required>
        </div>

        <div class="form-group">
            <label class="form-label">Student Email</label>
            <input type="email" name="student_email" class="form-control" placeholder="john@example.com" required>
        </div>

        <div style="margin-top: 2rem; display: flex; gap: 1rem;">
            <button type="submit" class="btn btn-primary">Enroll Now</button>
            <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
