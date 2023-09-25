@extends('layouts.app')
@section('content')
    <main id="main" class="main">

        <!-- ======= Page Title ======= -->
        <div class="pagetitle">
            <h1>App Settings</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">App Settings</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <div class="card">
            <div class="card-body">
                <!-- Multi Columns Form -->
                <form action="#" method="post" class="row g-3" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div style="margin-top: 3.5rem" class="col-md-12 mb-4">
                        <div class="col-md-4 d-flex align-items-center gap-3 m-auto">
                            <div class="position-relative d-inline-flex">
                                <img id="uploadedAvatar" width="100" class="rounded-circle"
                                    src="{{ setting('app_logo') !== null ? asset('storage/' . setting('app_logo')) : 'https://ui-avatars.com/api/?name=' . auth()->user()->name . '&color=7F9CF5&background=EBF4FF' }}"
                                    alt="Profile">
                                <a href="#" style="top: 10px; right: -4px; line-height: .2"
                                    class="account-image-reset btn btn-danger btn-sm position-absolute p-0 rounded-4"
                                    title="Remove my profile image"><i class="bi bi-x fs-5"></i></a>
                            </div>
                            <input class="form-control account-file-input" type="file" name="app_logo">
                        </div>
                    </div>
                    <hr class="border-secondary">
                    <div class="col-md-6">
                        <label for="website" class="form-label">Your Name Website</label>
                        <input type="text" name="app_title" value="{{ setting('app_title') }}"
                            class="form-control @error('app_title') is-invalid @enderror" placeholder="your name website"
                            id="website">
                        @error('app_title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Your Email Website</label>
                        <input type="email" name="app_email" value="{{ setting('app_email') }}"
                            class="form-control @error('app_email') is-invalid @enderror" placeholder="your email website"
                            id="email">
                        @error('app_email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="kode" class="form-label">Kode Website</label>
                        <input type="text" name="app_kode" value="{{ setting('app_kode') }}"
                            class="form-control @error('app_kode') is-invalid @enderror" placeholder="your kode"
                            id="kode">
                        @error('app_kode')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputPhone" class="form-label">Phone</label>
                        <input type="text" name="app_phone" value="{{ setting('app_phone') }}"
                            class="form-control @error('app_phone') is-invalid @enderror" placeholder="your phone number"
                            id="inputPhone">
                        @error('app_phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="website" class="form-label">Link Website</label>
                        <input name="app_link" type="text" class="form-control" placeholder="https://luminary.com"
                            id="website" value="{{ setting('app_link') }}">
                        @error('app_link')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="inputAddress5" class="form-label">Address</label>
                        <input type="text" name="app_address" value="{{ setting('app_address') }}"
                            class="form-control @error('app_address') is-invalid @enderror" id="inputAddres5s"
                            placeholder="apartment, studio, or floor">
                        @error('app_address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <hr class="border-secondary">
                    <div class="col-md-6">
                        <label for="paginate" class="form-label">Set Global Pagination</label>
                        <input type="text" name="app_paginate" value="{{ setting('app_paginate') }}"
                            class="form-control @error('app_paginate') is-invalid @enderror" id="paginate"
                            placeholder="10">
                        @error('app_paginate')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="text-end mt-4 mb-2">
                        <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
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
