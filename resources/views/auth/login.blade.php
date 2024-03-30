@extends('layouts.guest')

@section('style')

@endsection

@section('content')
    <div id="auth-left">
        <h1 class="auth-title mt-5">Login.</h1>
        <p class="auth-subtitle mb-5">
            Log in with your data that you entered during registration.
        </p>
        @error('error')
        <div class="alert alert-danger mb-5">
            {{ $message }}
        </div>
        @enderror
        <form action="/login" method="post" class="form">

            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="email" class="form-control form-control-xl" placeholder="Email" name="email"
                       value="{{ old('email') }}" required />
                <div class="form-control-icon">
                    <i class="bi bi-envelope"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl" placeholder="Password" name="password"
                       value="{{ old('password') }}" required />
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-4">
                Login
            </button>
        </form>
        <div class="text-center mt-5 text-lg fs-4">
            <p class="text-gray-600">
                Don't have an account?
                <a href="/register" class="font-bold">Register</a>.
            </p>
        </div>
    </div>
@endsection

@section('script')

@endsection
