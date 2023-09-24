@extends('layouts.app')
@section('content')
    <main id="main" class="main">

        <!-- ======= Page Title ======= -->
        <div class="pagetitle">
            <h1>Edit Users | {{ $user->name }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Form</li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Form User</h5>
                <!-- Multi Columns Form -->
                <form action="{{ route('users.update', $user) }}" method="post" class="row g-3"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-12 mb-4">
                        <div class="col-md-4 d-flex align-items-center gap-3 m-auto">
                            <div class="position-relative d-inline-flex">
                                <img id="uploadedAvatar" width="100" class="rounded-circle"
                                    src="{{ $user->image !== null ? asset('storage/' . $user->image) : 'https://ui-avatars.com/api/?name=' . $user->name . '&color=7F9CF5&background=EBF4FF' }}"
                                    alt="Profile">
                                <a href="#" style="top: 10px; right: -4px; line-height: .2"
                                    class="account-image-reset btn btn-danger btn-sm position-absolute p-0 rounded-4"
                                    title="Remove my profile image"><i class="bi bi-x fs-5"></i></a>
                            </div>
                            <input class="form-control account-file-input" type="file" name="image">
                        </div>
                    </div>
                    <hr class="border-secondary">
                    <div class="col-md-6">
                        <label for="inputName5" class="form-label">Your Name</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                            class="form-control @error('name') is-invalid @enderror" placeholder="your name"
                            id="inputName5">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputName5" class="form-label">Your Username</label>
                        <input type="text" name="username" value="{{ old('username', $user->username) }}"
                            class="form-control @error('username') is-invalid @enderror" placeholder="your username"
                            id="inputName5">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail5" class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                            class="form-control @error('email') is-invalid @enderror" placeholder="your email"
                            id="inputEmail5">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Min 8 character" id="inputPassword5">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="inputAddress5" class="form-label">Address</label>
                        <input type="text" name="address" value="{{ old('address', $user->address) }}"
                            class="form-control @error('address') is-invalid @enderror" id="inputAddres5s"
                            placeholder="apartment, studio, or floor">
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputPhone" class="form-label">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                            class="form-control @error('phone') is-invalid @enderror" placeholder="your phone number"
                            id="inputPhone">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="d-flex align-items-center justify-content-center gap-3">
                            <div class="form-check">
                                <input class="form-check-input" name="status" type="radio" id="active" value="active"
                                    {{ $user->status == 'active' ? 'checked' : '' }}>
                                <label class="form-check-label" for="active">
                                    Active
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="status" type="radio" id="inactive"
                                    value="inactive" {{ $user->status == 'inactive' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inactive">
                                    Inactive
                                </label>
                            </div>
                        </div>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="text-end mt-4 mb-2">
                        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">Cencel</a>
                        <button type="submit" class="btn btn-warning btn-sm">Edit User</button>
                    </div>
                </form>
                <!-- End Multi Columns Form -->

            </div>
        </div>
    </main>
    @pushOnce('image-preview')
        <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
            integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
        <script>
            // preview object URL
            $('input#accountActivation').on('change', function() {
                $('button.deactivate-account').attr('disabled', !$(this).is(':checked'));
            });
            document.addEventListener('DOMContentLoaded', function(e) {
                (function() {
                    // Update/reset user image of account page
                    let accountUserImage = document.getElementById('uploadedAvatar');
                    const fileInput = document.querySelector('.account-file-input'),
                        resetFileInput = document.querySelector('.account-image-reset');
                    if (accountUserImage) {
                        const resetImage = accountUserImage.src;
                        fileInput.onchange = () => {
                            if (fileInput.files[0]) {
                                accountUserImage.src = window.URL.createObjectURL(fileInput.files[0]);
                            }
                        };
                        resetFileInput.onclick = () => {
                            fileInput.value = '';
                            accountUserImage.src = resetImage;
                        };
                    }
                })
                ();
            });
        </script>
    @endpushOnce
@endsection
