@extends('layouts.app', ['title' => 'Rent Logs - ' . auth()->user()->name])
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
                @if ($userFines > 0)
                    <p class="mb-1">
                        Total fines : <b>{{ formatRupiah($userFines) }}</b> in {{ count($rentLogs) }} rent logs.
                    </p>
                @endif
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
                                    <th class="text-center" scope="row">
                                        {{ $loop->iteration + $rentLogs->perPage() * ($rentLogs->currentPage() - 1) }}
                                    </th>
                                    <td class="text-capitalize fw-bold">{{ auth()->user()->name }}</td>
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
                                        <a href="{{ route('user.rent-logs.show', [auth()->user()->username, $item->id]) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="bi bi-eye text-white"></i>
                                        </a>
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
                <div class='px-4 mt-2'>{{ $rentLogs->links() }}</div>

            </div>
        </div>
    </main>
@endsection
