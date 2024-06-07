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
                        <h4>User List</h4>
                        <a href="/users/create" class="btn btn-secondary me-1 mb-1">
                            <i data-feather="edit"></i> Create User
                        </a>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Roles</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
{{--                                    <td>{{ $user->category->category_name }}</td>--}}
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    @if($user->hasRole('admin'))
                                        <td>Administrator</td>
                                    @elseif($user->hasRole('user'))
                                        <td>User</td>
                                    @endif
                                    <td>
                                        <a href="/users/{{ $user->id }}/edit" class="btn icon btn-primary"
                                        ><i class="bi bi-pencil"></i
                                            ></a>
                                        <form action="/users/{{ $user->id }}" method="post" class="d-inline delete-task">
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
