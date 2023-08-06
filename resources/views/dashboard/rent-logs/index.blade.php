@extends('layouts.app')
@section('content')
    <main id="main" class="main">

        <!-- ======= Page Title ======= -->
        <div class="pagetitle">
            <h1>Data Rent Logs</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Main</li>
                    <li class="breadcrumb-item active">Rent Logs</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">List Table Rent Logs : {{ count($rentLogs) }}</h5>
                <p>
                    Rent Logs is a table that contains data about the borrowing of books by users.
                </p>
                <!-- Bordered Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center" scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Book Title</th>
                                <th scope="col">Rent Date</th>
                                <th scope="col">Return Date</th>
                                <th scope="col">Actual Return Date</th>
                                <th scope="col">Fine</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rentLogs as $item)
                                <tr class="{{ $item->setColorTable() }}">
                                    <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                    <td><a href="#">{{ $item->user->name }}</a></td>
                                    <td>{{ $item->book->title }}</td>
                                    <td>{{ $item->rent_date }}</td>
                                    <td>{{ $item->return_date }}</td>
                                    <td>
                                        {{ $item->actual_return_date }}
                                        <span
                                            class="badge {{ getStatusColor($item->setStatusRentLog()) }}">{{ $item->setStatusRentLog() }}</span>
                                    </td>
                                    <td>{{ $item->fine == 0 ? '-' : $item->fine }}</td>
                                    {{-- <td>
                                        <span
                                            class="badge {{ $item->role == 'operator' ? 'bg-info' : 'bg-primary' }}">{{ $item->role }}</span>
                                    </td> --}}
                                    {{-- <td>
                                        <div class="d-inline-flex gap-1">
                                            <a href="#" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square text-white"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#bookDelete">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
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
                                    </td> --}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- End Bordered Table -->
            </div>
        </div>
    </main>
@endsection
