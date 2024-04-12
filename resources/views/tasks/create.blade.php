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
                                    <form action="/tasks" method="post" class="form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="task_name">Task Name</label>
                                                    <input type="text"
                                                           class="form-control @error('task_name') is-invalid @enderror"
                                                           placeholder="Task Name" name="task_name"
                                                           value="{{ old('task_name') }}" />
                                                    @error('task_name')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label for="last-name-column">Status</label>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="status">Options</label>
                                                    <select class="form-select @error('status') is-invalid @enderror" name="status">>

                                                        <!-- Ensure old values are selected if form is returned with errors -->
                                                        <option value="TO_DO" {{ old('status') == 'TO_DO' ? 'selected' : '' }}>To Do</option>
                                                        <option value="IN_PROGRESS" {{ old('status') == 'IN_PROGRESS' ? 'selected' : '' }}>In Progress</option>
                                                        <option value="DONE" {{ old('status') == 'DONE' ? 'selected' : '' }}>Done</option>
                                                    </select>
                                                    @error('status')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <label for="last-name-column">Category</label>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="category">Options</label>
                                                    <select class="form-select @error('status') is-invalid @enderror" name="category">>

                                                        <!-- Ensure old values are selected if form is returned with errors -->
                                                        <option value="A" {{ old('status') == 'A' ? 'selected' : '' }}>A</option>
                                                        <option value="B" {{ old('status') == 'B' ? 'selected' : '' }}>B</option>
                                                        <option value="C" {{ old('status') == 'DONE' ? 'C' : '' }}>C</option>
                                                    </select>
                                                    @error('status')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                       
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="deadline">Deadline</label>
                                                    <input type="date"
                                                           class="form-control flatpickr-no-config @error('deadline') is-invalid @enderror"
                                                           placeholder="Select date.." name="deadline"
                                                           value="{{ old('deadline') }}" />
                                                    @error('deadline')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Description" name="description"
                                                              rows="3">{{ old('description') }}</textarea>
                                                    @error('description')
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
    <script src="/../assets/js/date-picker.js"></script>
@endsection