@extends('layouts.master')

@section('content')
<div class="header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div>
        <h1>Lessons for: {{ $course->name }}</h1>
        <p style="color: var(--text-muted);">Manage lessons in this course</p>
    </div>
    <div>
        <a href="{{ route('lessons.create', ['course_id' => $course->id]) }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> &nbsp; Add Lesson
        </a>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">
            Back to Courses
        </a>
    </div>
</div>

<div class="card">
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Title</th>
                    <th>Video URL</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lessons as $lesson)
                <tr>
                    <td>{{ $lesson->order }}</td>
                    <td>{{ $lesson->title }}</td>
                    <td>
                        @if($lesson->video_url)
                            <a href="{{ $lesson->video_url }}" target="_blank" style="color: var(--primary);">Link</a>
                        @else
                            <span style="color: var(--text-muted);">No Video</span>
                        @endif
                    </td>
                    <td>{{ $lesson->created_at->format('M d, Y') }}</td>
                    <td>
                        <button class="btn btn-sm btn-danger" disabled>Delete</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 2rem; color: var(--text-muted);">No lessons found for this course.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
