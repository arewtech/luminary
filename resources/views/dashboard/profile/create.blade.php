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

                            <img src="{{ auth()->user()->image !== null ? asset('storage/' . auth()->user()->image) : 'https://ui-avatars.com/api/?name=' . auth()->user()->name . '&color=7F9CF5&background=EBF4FF' }}"
                                alt="Profile" class="rounded-circle">
                            <h2 class="text-capitalize">{{ auth()->user()->name }}</h2>
                            <h3 class="text-capitalize">{{ auth()->user()->occupation ?? '-' }}</h3>
                            <div class="social-links mt-2">
                                <a href="{{ auth()->user()->link_twitter }}"
                                    {{ !empty(auth()->user()->link_twitter) ? 'target="_blank"' : '' }} class="twitter">
                                    <i class="bi bi-twitter"></i>
                                </a>
                                <a href="{{ auth()->user()->link_facebook }}"
                                    {{ !empty(auth()->user()->link_facebook) ? 'target="_blank"' : '' }} class="facebook">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="{{ auth()->user()->link_instagram }}"
                                    {{ !empty(auth()->user()->link_instagram) ? 'target="_blank"' : '' }} class="instagram">
                                    <i class="bi bi-instagram"></i>
                                </a>
                                <a href="{{ auth()->user()->link_linkedin }}"
                                    {{ !empty(auth()->user()->link_linkedin) ? 'target="_blank"' : '' }} class="linkedin">
                                    <i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview"
                                        aria-selected="true" role="tab">Overview</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit"
                                        aria-selected="false" role="tab" tabindex="-1">Edit Profile</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password"
                                        aria-selected="false" role="tab" tabindex="-1">Change Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade profile-overview active show" id="profile-overview"
                                    role="tabpanel">
                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                        <div class="col-lg-9 col-md-8">{{ auth()->user()->name }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{ auth()->user()->email ?? '-' }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Occupation</div>
                                        <div class="col-lg-9 col-md-8">{{ auth()->user()->occupation ?? '-' }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Address</div>
                                        <div class="col-lg-9 col-md-8">{{ auth()->user()->address ?? '-' }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Phone</div>
                                        <div class="col-lg-9 col-md-8">{{ auth()->user()->phone ?? '-' }}</div>
                                    </div>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit" role="tabpanel">

                                    <!-- Profile Edit Form -->
                                    <form action="{{ route('profile.update') }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                                Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="position-relative d-inline-flex">
                                                    <img width="100"
                                                        src="{{ auth()->user()->image !== null ? asset('storage/' . auth()->user()->image) : 'https://ui-avatars.com/api/?name=' . auth()->user()->name . '&color=7F9CF5&background=EBF4FF' }}"
                                                        alt="Profile">
                                                    <a href="#" style="top: -10px; right: -10px; line-height: .2"
                                                        class="btn btn-danger btn-sm position-absolute p-0 rounded-4"
                                                        title="Remove my profile image"><i class="bi bi-x fs-5"></i></a>
                                                </div>
                                                <input class="form-control" type="file">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full
                                                Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="fullName" value="{{ auth()->user()->name }}">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="username" class="col-md-4 col-lg-3 col-form-label">Username
                                            </label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="username" type="text"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    id="username" value="{{ auth()->user()->username }}">
                                                @error('username')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="Email" value="{{ auth()->user()->email }}">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Job"
                                                class="col-md-4 col-lg-3 col-form-label">Occupation</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="occupation" type="text" class="form-control"
                                                    id="Job" value="{{ auth()->user()->occupation }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="address" type="text" class="form-control" id="Address"
                                                    value="{{ auth()->user()->address }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phone" type="text" class="form-control" id="Phone"
                                                    value="{{ auth()->user()->phone }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="link_twitter" type="text" class="form-control"
                                                    id="Twitter" value="{{ auth()->user()->link_twitter }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="link_facebook" type="text" class="form-control"
                                                    id="Facebook" value="{{ auth()->user()->link_facebook }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="link_instagram" type="text" class="form-control"
                                                    id="Instagram" value="{{ auth()->user()->link_instagram }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="link_linkedin" type="text" class="form-control"
                                                    id="Linkedin" value="{{ auth()->user()->link_linkedin }}">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                    <!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password" role="tabpanel">
                                    <!-- Change Password Form -->
                                    <form action="{{ route('profile.password.update') }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="row mb-3">
                                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="current_password" type="password"
                                                    class="form-control @error('current_password') is-invalid @enderror"
                                                    id="currentPassword">
                                                @error('current_password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="newPassword">
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password_confirmation" type="password"
                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                    id="renewPassword">
                                                @error('password_confirmation')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div>
                            <!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
