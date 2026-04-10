@extends('layouts.master')

@section('content')
<div class="header" style="margin-bottom: 2rem;">
    <h1>Edit Course: {{ $course->name }}</h1>
    <p style="color: var(--text-muted);">Modify course details</p>
</div>

<div class="card" style="max-width: 800px;">
    <form action="{{ route('courses.update', $course) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label class="form-label">Course Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $course->name) }}" required>
            @error('name') <small style="color: var(--danger);">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Price ($)</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $course->price) }}" required>
            @error('price') <small style="color: var(--danger);">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description', $course->description) }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Course Image</label>
            @if($course->image)
                <div style="margin-bottom: 1rem;">
                    <img src="{{ asset('storage/' . $course->image) }}" alt="" style="width: 150px; border-radius: 8px;">
                </div>
            @endif
            <input type="file" name="image" class="form-control">
            <small style="color: var(--text-muted);">Leave empty to keep current image</small>
            @error('image') <small style="color: var(--danger);">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="draft" {{ old('status', $course->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status', $course->status) == 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>

        <div style="margin-top: 2rem; display: flex; gap: 1rem;">
            <button type="submit" class="btn btn-primary">Update Course</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
