@extends('layouts.app')
@section('content')
    <main id="main" class="main">

        <!-- ======= Page Title ======= -->
        <div class="pagetitle d-flex justify-content-between align-items-center">
            <div>
                <h1>Data Users</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">Create User</a>
        </div>
        <!-- End Page Title -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">List Table Users : 1</h5>
                <p>
                    Users are people who can access the system.
                </p>
                <!-- Bordered Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center" scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Status</th>
                                <th scope="col">Role</th>
                                <th scope="col" style="width: 200px">Address</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-center" scope="row">1</th>
                                <td>Joko Skuyy</td>
                                <td>joko@gmail.com</td>
                                <td>082830120</td>
                                <td><span class="badge bg-primary">user</span></td>
                                <td><span class="badge bg-danger">inactive</span></td>
                                <td class="line-clamp">
                                    8888 Cummings Vista Apt. 101, Susanbury, NY 95473
                                </td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square text-white"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#bookDelete">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <!-- Button trigger modal -->
                                    <div class="modal fade" id="bookDelete" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete User</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this user?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Button trigger modal -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- End Bordered Table -->
            </div>
        </div>
    </main>
@endsection
