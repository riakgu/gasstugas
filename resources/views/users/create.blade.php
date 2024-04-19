@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')
    <div id="main-content">

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 mb-4 order-md-1 order-last">
                        <h3>{{ $title }}</h3>
                    </div>
                </div>
            </div>

            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="/users" method="post" class="form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text"
                                                           class="form-control @error('name') is-invalid @enderror"
                                                           placeholder="Name" name="name"
                                                           value="{{ old('name') }}" />
                                                    @error('name')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           placeholder="Email" name="email"
                                                           value="{{ old('email') }}" />
                                                    @error('email')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="text"
                                                           class="form-control @error('phone') is-invalid @enderror"
                                                           placeholder="Phone" name="phone"
                                                           value="{{ old('phone') }}" />
                                                    @error('phone')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <label for="last-name-column">Role</label>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="role">Options</label>
                                                    <select class="form-select @error('role') is-invalid @enderror" name="role">>
                                                        @foreach($roles as $role)
                                                            <option value="{{$role->name}}">{{$role->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('role')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="text"
                                                           class="form-control @error('password') is-invalid @enderror"
                                                           placeholder="Password" name="password"
                                                           value="{{ old('password') }}" />
                                                    @error('password')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="password_confirmation">Confirm Password</label>
                                                    <input type="text"
                                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                                           placeholder="Confirm Password" name="password_confirmation"
                                                           value="{{ old('password_confirmation') }}" />
                                                    @error('password_confirmation')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>

@endsection

@section('script')
    <<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="/../assets/js/pages/date-picker.js"></script>
@endsection
