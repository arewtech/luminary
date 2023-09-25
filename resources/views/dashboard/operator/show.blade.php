@extends('layouts.app')
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

                            <img src="{{ $operator->image !== null ? asset('storage/' . $operator->image) : 'https://ui-avatars.com/api/?name=' . $operator->name . '&color=7F9CF5&background=EBF4FF' }}"
                                alt="Profile" class="rounded-circle">
                            <h2 class="text-capitalize">{{ $operator->name }}</h2>
                            <h3 class="text-capitalize">{{ $operator->occupation ?? '-' }}</h3>
                            <div class="social-links mt-2">
                                <a href="{{ $operator->link_twitter }}"
                                    {{ !empty($operator->link_twitter) ? 'target="_blank"' : '' }} class="twitter">
                                    <i class="bi bi-twitter"></i>
                                </a>
                                <a href="{{ $operator->link_facebook }}"
                                    {{ !empty($operator->link_facebook) ? 'target="_blank"' : '' }} class="facebook">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="{{ $operator->link_instagram }}"
                                    {{ !empty($operator->link_instagram) ? 'target="_blank"' : '' }} class="instagram">
                                    <i class="bi bi-instagram"></i>
                                </a>
                                <a href="{{ $operator->link_linkedin }}"
                                    {{ !empty($operator->link_linkedin) ? 'target="_blank"' : '' }} class="linkedin">
                                    <i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fs-4">Profile Details</h5>

                            <div class="row mb-3">
                                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                <div class="col-lg-9 col-md-8">{{ $operator->name }}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8">{{ $operator->email ?? '-' }}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-3 col-md-4 label">Occupation</div>
                                <div class="col-lg-9 col-md-8">{{ $operator->occupation ?? '-' }}</div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-3 col-md-4 label">Address</div>
                                <div class="col-lg-9 col-md-8">{{ $operator->address ?? '-' }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Phone</div>
                                <div class="col-lg-9 col-md-8">{{ $operator->phone ?? '-' }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
