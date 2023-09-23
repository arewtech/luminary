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
                {{--  --}}
                <h5 class="card-title">List Table Rent Logs : {{ count($rentLogs) }}</h5>
                <p class="mb-1">
                    Total fines : <b>{{ formatRupiah($totalFines) }}</b> in {{ count($rentLogs) }} rent logs.
                </p>
                <p>
                    Rent Logs is a table that contains data about the borrowing of books by users.
                </p>
                <!-- Bordered Table -->
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Book Title</th>
                                <th class="text-center" scope="col">Rent Date</th>
                                <th class="text-center" scope="col">Return Date</th>
                                <th class="text-center" scope="col">Actual Return Date</th>
                                <th class="text-center" scope="col">Fine</th>
                                <th class="text-center" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($rentLogs as $item)
                                <tr class="{{ $item->setColorTable() }}">
                                    <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                    <td class="text-capitalize fw-bold">{{ $item->user->name }}</td>
                                    <td>{{ $item->book->title }}</td>
                                    <td class="text-center">{{ Carbon\Carbon::parse($item->rent_date)->format('d/m/y') }}
                                    </td>
                                    <td class="text-center">{{ Carbon\Carbon::parse($item->return_date)->format('d/m/y') }}
                                    </td>
                                    <td class="text-center">
                                        {{-- {{ $item->actual_return_date != null ? Carbon\Carbon::parse($item?->actual_return_date)->format('d/m/y') : '' }} --}}
                                        <span
                                            class="badge {{ getStatusColor($item->setStatusRentLog()) }}">{{ $item->setStatusRentLog() }}</span>
                                    </td>
                                    <td class="text-center">{{ $item->setReturned() }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('rent-logs.show', $item->id) }}" class="btn btn-info btn-sm">
                                            <i class="bi bi-eye text-white"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#bookDelete{{ $item->id }}">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <!-- Button trigger modal -->
                                        <div class="modal fade" id="bookDelete{{ $item->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-capitalize">
                                                            Delete Rent Log {{ $item->user->name }}
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-start">Are you sure you want to delete this rent log?
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <form action="{{ route('rent-logs.destroy', $item->id) }}"
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
                                    <td colspan="8" class="text-center">No Data</td>
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
