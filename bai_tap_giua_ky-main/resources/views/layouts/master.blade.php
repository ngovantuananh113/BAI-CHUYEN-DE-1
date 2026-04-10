<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Course MS' }} - Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="sidebar">
        <h2>Course MS</h2>
        <ul class="nav-links">
            <li>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-line"></i> &nbsp; Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('courses.index') }}" class="{{ request()->routeIs('courses.*') ? 'active' : '' }}">
                    <i class="fas fa-book"></i> &nbsp; Courses
                </a>
            </li>
            <li>
                <a href="{{ route('enrollments.index') }}" class="{{ request()->routeIs('enrollments.*') ? 'active' : '' }}">
                    <i class="fas fa-user-graduate"></i> &nbsp; Enrollments
                </a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
