@extends('layouts.app', ['title' => 'Users'])
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
                <h5 class="card-title">List Table Users : {{ count($users) }}</h5>
                <p>
                    Users are people who can access the system.
                </p>
                <!-- Bordered Table -->
                <div class="table-responsive">
                    <table class="table table-sm table-hover">
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
                            @forelse ($users as $item)
                                <tr>
                                    <th class="text-center" scope="row">
                                        {{ $loop->iteration + $users->perPage() * ($users->currentPage() - 1) }}
                                    </th>
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
                                    <td>
                                        <div class="d-inline-flex gap-1">
                                            <a href="{{ route('users.show', $item) }}" class="btn btn-info btn-sm">
                                                <i class="bi bi-eye text-white"></i>
                                            </a>
                                            <a href="{{ route('users.edit', $item) }}" class="btn btn-warning btn-sm">
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
                                                        <form action="{{ route('users.destroy', $item) }}" method="post">
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
                <div class='px-4 mt-2'>{{ $users->links() }}</div>
            </div>
        </div>
    </main>
@endsection
