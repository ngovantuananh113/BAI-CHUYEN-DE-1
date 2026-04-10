@extends('layouts.master')

@section('content')
<div class="header" style="margin-bottom: 2rem;">
    <h1>Create New Course</h1>
    <p style="color: var(--text-muted);">Add a new online course to the system</p>
</div>

<div class="card" style="max-width: 800px;">
    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label class="form-label">Course Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name') <small style="color: var(--danger);">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Price ($)</label>
            <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required>
            @error('price') <small style="color: var(--danger);">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Course Image</label>
            <input type="file" name="image" class="form-control">
            @error('image') <small style="color: var(--danger);">{{ $message }}</small> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
            </select>
        </div>

        <div style="margin-top: 2rem; display: flex; gap: 1rem;">
            <button type="submit" class="btn btn-primary">Create Course</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
