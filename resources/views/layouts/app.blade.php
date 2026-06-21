<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Employee Mini Project')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

@auth
<nav class="navbar navbar-expand navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('employees.index') }}">Employee Mini Project</a>
        <div class="navbar-nav">
            <a class="nav-link" href="{{ route('employees.index') }}">Employees</a>
            <a class="nav-link" href="{{ route('summary') }}">Summary</a>
        </div>
        <div class="ms-auto d-flex align-items-center">
            <span class="text-light me-3">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </div>
    </div>
</nav>
@endauth

<div class="container">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</div>

</body>
</html>
