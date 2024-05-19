@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/css/datatable.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.min.css">
@endsection

@section('content')
    <div id="main-content">

        <div class="page-heading">
            <h3>{{ $title }}</h3>
        </div>
        <div class="page-heading">

            <section class="row">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Undone Task</h6>
                                            <h3 class="font-extrabold mb-0">{{ $undone_task }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Total Task</h6>
                                            <h3 class="font-extrabold mb-0">{{  $total_task  }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if(auth()->user()->hasRole('admin'))
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-12">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Total User</h6>
                                                <h3 class="font-extrabold mb-0">{{ $total_user }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-md-12">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Total Category</h6>
                                                <h3 class="font-extrabold mb-0">{{  $total_category }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </section>

            <section class="section">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Deadline Today</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                            <tr>
                                <th>Task Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->task_name }}</td>
                                    <td>{{ $task->category->category_name }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->deadline }}</td>
                                    @if ($task->status == 'TO_DO')
                                        <td>
                                            <span class="badge bg-secondary">To Do</span>
                                        </td>
                                    @elseif($task->status == 'IN_PROGRESS')
                                        <td>
                                            <span class="badge bg-info">In Progress</span>
                                        </td>
                                    @elseif($task->status == 'DONE')
                                        <td>
                                            <span class="badge bg-success">Done</span>
                                        </td>
                                    @endif
                                    <td>
                                        <a href="/tasks/{{ $task->id }}/edit" class="btn icon btn-primary"
                                        ><i class="bi bi-pencil"></i
                                            ></a>
                                        <form action="/tasks/{{ $task->id }}" method="post" class="d-inline delete-task">
                                            @method('delete')
                                            @csrf
                                            <button class="btn icon btn-danger delete-task-btn">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection

@section('script')
    <script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="assets/js/pages/datatable.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.all.min.js"></script>
    <script src="/../assets/js/pages/sweetalert2.js"></script>

@endsection

