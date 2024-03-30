@extends('layouts.guest')

@section('style')

@endsection

@section('content')
    <div id="auth-left">
        <h1 class="auth-title mt-5">Register.</h1>
        <p class="auth-subtitle mb-5">
            Input your data to register to our website.
        </p>
        @if (session('success'))
            <div class="alert alert-success mb-5">
                {{ session('success') }}
            </div>
        @endif
        <form action="/register" method="post" class="form">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl @error('name') is-invalid @enderror"
                       placeholder="Name" name="name" value="{{ old('name') }}" required />
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>
                @error('name')
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="email" class="form-control form-control-xl @error('email') is-invalid @enderror"
                       placeholder="Email" name="email" value="{{ old('email') }}" required />
                <div class="form-control-icon">
                    <i class="bi bi-envelope"></i>
                </div>

                @error('email')
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror"
                       placeholder="Password" name="password" value="{{ old('password') }}" required />
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
                @error('password')
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror"
                       placeholder="Confirm Password" name="password_confirmation" value="{{ old('password_confirmation') }}"
                       required />
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
                @error('password')
                <div class="invalid-feedback">
                    <i class="bx bx-radio-circle"></i>
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-4">
                Register
            </button>
        </form>
        <div class="text-center mt-5 text-lg fs-4">
            <p class="text-gray-600">
                Already have an account?
                <a href="/login" class="font-bold">Login</a>.
            </p>
        </div>
    </div>
@endsection

@section('script')

@endsection
