@extends('layouts.app', ['title' => 'Detail User - ' . $user->username])
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item">Users</li> --}}
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="{{ $user->image !== null ? asset('storage/' . $user->image) : 'https://ui-avatars.com/api/?name=' . $user->name . '&color=7F9CF5&background=EBF4FF' }}"
                                alt="Profile" class="rounded-circle">
                            <h2 class="text-capitalize">{{ $user->name }}</h2>
                            <h3 class="text-capitalize">{{ $user->occupation ?? '-' }}</h3>
                            <div class="social-links mt-2">
                                <a href="{{ $user->link_twitter }}"
                                    {{ !empty($user->link_twitter) ? 'target="_blank"' : '' }} class="twitter">
                                    <i class="bi bi-twitter"></i>
                                </a>
                                <a href="{{ $user->link_facebook }}"
                                    {{ !empty($user->link_facebook) ? 'target="_blank"' : '' }} class="facebook">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="{{ $user->link_instagram }}"
                                    {{ !empty($user->link_instagram) ? 'target="_blank"' : '' }} class="instagram">
                                    <i class="bi bi-instagram"></i>
                                </a>
                                <a href="{{ $user->link_linkedin }}"
                                    {{ !empty($user->link_linkedin) ? 'target="_blank"' : '' }} class="linkedin">
                                    <i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Profile Details</h5>

                            <div class="row mb-3">
                                <div class="col-lg-3 col-md-4 label ">Username</div>
                                <div class="col-lg-9 col-md-8 text-capitalize">{{ $user->username }}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8">{{ $user->email ?? '-' }}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-3 col-md-4 label">Occupation</div>
                                <div class="col-lg-9 col-md-8">{{ $user->occupation ?? '-' }}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-3 col-md-4 label">Address</div>
                                <div class="col-lg-9 col-md-8">{{ $user->address ?? '-' }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Phone</div>
                                <div class="col-lg-9 col-md-8">{{ $user->phone ?? '-' }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @if ($user->rentLogs->count() > 0)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">List Table Rent Logs : {{ count($user->rentLogs) }}</h5>
                        @if ($userFines > 0)
                            <p class="mb-1">
                                Total fines : <b>{{ formatRupiah($userFines) }}</b> in {{ count($user->rentLogs) }} rent
                                logs.
                            </p>
                        @endif
                        <p>
                            Rent Logs is a table that contains data about the borrowing of books by
                            <b>{{ $user->name }}</b>.
                        </p>
                        <!-- Bordered Table -->
                        <div class="table-responsive">
                            <table class="table table-sm table-hover table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center" scope="col">No</th>
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
                                            <td>{{ $item->book->title }}</td>
                                            <td class="text-center">
                                                {{ Carbon\Carbon::parse($item->rent_date)->format('d/m/y') }}
                                            </td>
                                            <td class="text-center">
                                                {{ Carbon\Carbon::parse($item->return_date)->format('d/m/y') }}
                                            </td>
                                            <td class="text-center">
                                                {{-- {{ $item->actual_return_date != null ? Carbon\Carbon::parse($item?->actual_return_date)->format('d/m/y') : '' }} --}}
                                                <span
                                                    class="badge {{ getStatusColor($item->setStatusRentLog()) }}">{{ $item->setStatusRentLog() }}</span>
                                            </td>
                                            <td class="text-center">{{ $item->setReturned() }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('rent-logs.show', $item->id) }}"
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
            @endif
        </section>

    </main>
@endsection
