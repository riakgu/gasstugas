@extends('layouts.main')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/css/datatable.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.min.css">
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
            <section class="section">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Task List</h4>
                        <a href="/tasks/create" class="btn btn-secondary me-1 mb-1">
                            <i data-feather="edit"></i> Create Task
                        </a>
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
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
    <script src="assets/js/pages/datatable.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.all.min.js"></script>
    <script src="/../assets/js/pages/sweetalert2.js"></script>
@endsection
