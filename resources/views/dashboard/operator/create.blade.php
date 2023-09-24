@extends('layouts.app')
@section('content')
    <main id="main" class="main">

        <!-- ======= Page Title ======= -->
        <div class="pagetitle">
            <h1>Create Operator</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Form</li>
                    <li class="breadcrumb-item"><a href="{{ route('operator.index') }}">Operator</a></li>
                    <li class="breadcrumb-item active">Create Operator</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create Form Operator</h5>

                <!-- Multi Columns Form -->
                <form action="{{ route('operator.store') }}" method="post" class="row g-3" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputName5" class="form-label">Your Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
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
                        <input type="text" name="username" value="{{ old('username') }}"
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
                        <input type="email" name="email" value="{{ old('email') }}"
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
                        <input type="text" name="address" value="{{ old('address') }}"
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
                        <input type="text" name="phone" value="{{ old('phone') }}"
                            class="form-control @error('phone') is-invalid @enderror" placeholder="your phone number"
                            id="inputPhone">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputImage" class="form-label">Image</label>
                        <input type="file" name="image" value="{{ old('image') }}"
                            class="form-control @error('image') is-invalid @enderror" id="inputImage">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="text-end mt-4 mb-2">
                        <a href="{{ route('operator.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
                        <button type="submit" class="btn btn-primary btn-sm">Create User</button>
                    </div>
                </form>
                <!-- End Multi Columns Form -->

            </div>
        </div>
    </main>
@endsection
