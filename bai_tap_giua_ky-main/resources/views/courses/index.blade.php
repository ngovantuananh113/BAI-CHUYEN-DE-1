@extends('layouts.master')

@section('content')
<div class="header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <div>
        <h1>Courses</h1>
        <p style="color: var(--text-muted);">Manage your online courses</p>
    </div>
    <a href="{{ route('courses.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> &nbsp; New Course
    </a>
</div>

<div class="card">
    <form action="{{ route('courses.index') }}" method="GET" style="display: flex; gap: 1rem; align-items: flex-end;">
        <div class="form-group" style="flex: 2; margin-bottom: 0;">
            <label class="form-label">Search</label>
            <input type="text" name="search" class="form-control" placeholder="Course name..." value="{{ request('search') }}">
        </div>
        <div class="form-group" style="flex: 1; margin-bottom: 0;">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="">All Status</option>
                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>
        <button type="submit" class="btn btn-secondary">Filter</button>
        <a href="{{ route('courses.index') }}" class="btn btn-sm btn-secondary" style="height: 38px; display: flex; align-items: center;">Clear</a>
    </form>
</div>

<div class="card">
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Lessons</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $course)
                <tr>
                    <td>
                        @if($course->image)
                            <img src="{{ asset('storage/' . $course->image) }}" alt="" style="width: 50px; height: 35px; object-fit: cover; border-radius: 4px;">
                        @else
                            <div style="width: 50px; height: 35px; background: #eee; border-radius: 4px; display: flex; align-items: center; justify-content: center; font-size: 10px; color: #999;">No Image</div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $course->name }}</strong><br>
                        <small style="color: grey;">{{ $course->slug }}</small>
                    </td>
                    <td>${{ number_format($course->price, 2) }}</td>
                    <td>
                        <span class="badge badge-{{ $course->status }}">
                            {{ ucfirst($course->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('lessons.byCourse', $course) }}" style="color: var(--primary); text-decoration: none;">
                            <i class="fas fa-list"></i> {{ $course->lessons_count }} Lessons
                        </a>
                    </td>
                    <td>
                        <div style="display: flex; gap: 0.5rem;">
                            <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-success">Edit</a>
                            <form action="{{ route('courses.destroy', $course) }}" method="POST" onsubmit="return confirm('Soft delete this course?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 2rem; color: var(--text-muted);">No courses found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div style="margin-top: 1.5rem;">
        {{ $courses->appends(request()->query())->links() }}
    </div>
</div>
@endsection
