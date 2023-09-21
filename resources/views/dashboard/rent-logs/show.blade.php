@extends('layouts.app')
@section('content')
    <main id="main" class="main">

        <!-- ======= Page Title ======= -->
        <div class="pagetitle">
            <h1 class="fw-normal text-secondary">Detail Rent Log
                <span class="fw-bold text-capitalize">{{ $rentLog->user->name }} 📖</span>
            </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Main</li>
                    <li class="breadcrumb-item active">Rent Log</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->
        <div class="row align-items-top">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <h5 class="card-title pt-2">Rent Log Details</h5>
                        <div class="row mb-3">
                            <div class="col-md-4 label">Full Name</div>
                            <div class="col-md-8 text-capitalize">{{ $rentLog->user->name }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 label">Email</div>
                            <div class="col-md-8">{{ $rentLog->user->email }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 label">Phone</div>
                            <div class="col-md-8">{{ $rentLog->user->phone ?? '-' }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 label">Rent Date</div>
                            <div class="col-md-8">
                                {{ Carbon\Carbon::parse($rentLog->rent_date)->format('l, d F Y') }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 label">Return Date</div>
                            <div class="col-md-8">
                                {{ Carbon\Carbon::parse($rentLog->return_date)->format('l, d F Y') }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 label">Actual Return Date</div>
                            <div class="col-md-8">
                                {{ $rentLog->actual_return_date == null ? '-' : Carbon\Carbon::parse($rentLog->actual_return_date)->format('l, d F Y') }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 label">Fine</div>
                            <div class="col-md-8">{{ $rentLog->fine == 0 ? '-' : formatRupiah($rentLog->fine) }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 label">Status</div>
                            <div class="col-md-8"><span
                                    class="badge {{ getStatusColor($rentLog->setStatusRentLog()) }}">{{ $rentLog->setStatusRentLog() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-0">
                    <img style="object-fit: cover; object-position: center;"
                        src="{{ $rentLog->book->cover !== null ? asset('storage/' . $rentLog->book->cover) : 'https://ui-avatars.com/api/?name=' . $rentLog->book->title . '&color=7F9CF5&background=EBF4FF' }}"
                        class="card-img-top" with="100%" height="200px" alt="{{ $rentLog->book->title }}">
                    <div class="card-body">
                        <h3 class="card-title pb-0 mb-0 pt-3">{{ $rentLog->book->title }}</h3>
                        <div class="d-flex align-items-center gap-1 mt-2 flex-wrap">
                            @foreach ($rentLog->book->categories as $category)
                                <span class="badge text-lowercase bg-secondary rounded-2">{{ $category->name }}</span>
                            @endforeach
                        </div>
                        <span class="font-weight-normal text-secondary form-text">Author :
                            <span class="font-weight-bold">{{ $rentLog->book->author }}</span></span>
                        <hr class="mt-2">
                        <p class="card-text mt-2 form-text line-clamp">{{ $rentLog->book->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
