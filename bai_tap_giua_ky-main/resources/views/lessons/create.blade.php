@extends('layouts.master')

@section('content')
<div class="header" style="margin-bottom: 2rem;">
    <h1>Add New Lesson</h1>
    <p style="color: var(--text-muted);">Define content for a course</p>
</div>

<div class="card" style="max-width: 800px;">
    <form action="{{ route('lessons.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label class="form-label">Course</label>
            <select name="course_id" class="form-control">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $courseId == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Lesson Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label">Content</label>
            <textarea name="content" class="form-control" rows="6" required></textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Video URL</label>
            <input type="url" name="video_url" class="form-control" placeholder="https://youtube.com/...">
        </div>

        <div class="form-group">
            <label class="form-label">Order</label>
            <input type="number" name="order" class="form-control" value="0">
        </div>

        <div style="margin-top: 2rem; display: flex; gap: 1rem;">
            <button type="submit" class="btn btn-primary">Save Lesson</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
