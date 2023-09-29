@extends('layouts.app', ['title' => 'Data Operator'])
@section('content')
    <main id="main" class="main">

        <!-- ======= Page Title ======= -->
        <div class="pagetitle d-flex justify-content-between align-items-center">
            <div>
                <h1>Data Operator</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">Operator</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('operator.create') }}" class="btn btn-primary btn-sm">Create Operator</a>
        </div>
        <!-- End Page Title -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">List Table Operator : {{ count($operator) }}</h5>
                <p>
                    Operator are people who can access the system.
                </p>
                <!-- Bordered Table -->
                <div class="table-responsive">
                    <table class="table table-hover table-sm">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($operator as $item)
                                <tr>
                                    <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                    <td class="text-capitalize">{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone ?? 'nothing' }}</td>
                                    <td>
                                        <span
                                            class="badge {{ $item->role == 'operator' ? 'bg-info' : 'bg-primary' }}">{{ $item->role }}</span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge {{ $item->status == 'active' ? 'bg-success' : 'bg-danger' }}">{{ $item->status }}</span>
                                    </td>
                                    {{-- <td class="line-clamp">
                                        {{ $item->address ?? 'nothing' }}
                                    </td> --}}
                                    <td>
                                        <div class="d-inline-flex gap-1">
                                            <a href="{{ route('operator.show', $item) }}" class="btn btn-info btn-sm">
                                                <i class="bi bi-eye text-white"></i>
                                            </a>
                                            <a href="{{ route('operator.edit', $item) }}" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square text-white"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#userDelete{{ $item->username }}">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                        <!-- Button trigger modal -->
                                        <div class="modal fade" id="userDelete{{ $item->username }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-capitalize">
                                                            Delete User {{ $item->name }}
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this user?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <form action="{{ route('operator.destroy', $item) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Button trigger modal -->
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No data available in table</td>
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
