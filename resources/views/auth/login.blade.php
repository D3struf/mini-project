@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title mb-3 text-center">Sign In</h4>

                <form method="POST" action="{{ route('login.attempt') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" value="{{ old('username') }}"
                               class="form-control @error('username') is-invalid @enderror" autofocus>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password"
                               class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
        <p class="text-muted text-center mt-3 small">Seeded login: <strong>admin</strong> / <strong>password123</strong></p>
    </div>
</div>
@endsection
