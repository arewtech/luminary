@extends('layouts.app')
@section('content')
    <main id="main" class="main">

        <!-- ======= Page Title ======= -->
        <div class="pagetitle">
            <h1>Create Users</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Form</li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                    <li class="breadcrumb-item active">Create User</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create Form User</h5>

                <!-- Multi Columns Form -->
                <form class="row g-3">
                    <div class="col-md-6">
                        <label for="inputName5" class="form-label">Your Name</label>
                        <input type="text" class="form-control" placeholder="your name" id="inputName5">
                    </div>
                    <div class="col-md-6">
                        <label for="inputName5" class="form-label">Your Username</label>
                        <input type="text" class="form-control" placeholder="your username" id="inputName5">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail5" class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="your email" id="inputEmail5">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="your email" id="inputPassword5">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress5" class="form-label">Address</label>
                        <input type="text" class="form-control" id="inputAddres5s"
                            placeholder="apartment, studio, or floor">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPhone" class="form-label">Phone</label>
                        <input type="text" class="form-control" placeholder="your phone number" id="inputPhone">
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Role</label>
                        <select id="inputState" class="form-select">
                            <option selected="" disabled>Choose roles</option>
                            <option>operator</option>
                            <option>user</option>
                        </select>
                    </div>
                    <div class="text-end mt-4 mb-2">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                </form><!-- End Multi Columns Form -->

            </div>
        </div>
    </main>
@endsection
