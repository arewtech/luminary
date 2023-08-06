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
                @foreach ($errors->all() as $item)
                    {{ $item }}
                @endforeach
                <form action="{{ route('users.update', $user) }}" method="post" class="row g-3">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="inputName5" class="form-label">Your Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                            placeholder="your name" id="inputName5">
                    </div>
                    <div class="col-md-6">
                        <label for="inputName5" class="form-label">Your Username</label>
                        <input type="text" name="username" value="{{ $user->username }}" class="form-control"
                            placeholder="your username" id="inputName5">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail5" class="form-label">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                            placeholder="your email" id="inputEmail5">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Min 8 character"
                            id="inputPassword5">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress5" class="form-label">Address</label>
                        <input type="text" name="address" value="{{ $user->address }}" class="form-control"
                            id="inputAddres5s" placeholder="apartment, studio, or floor">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPhone" class="form-label">Phone</label>
                        <input type="text" name="phone" value="{{ $user->phone }}" class="form-control"
                            placeholder="your phone number" id="inputPhone">
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Role</label>
                        <select id="inputState" name="role" class="form-select">
                            <option value="operator" {{ $user->role == 'operator' ? 'selected' : '' }}>operator</option>
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>user</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Status</label>
                        <select id="inputState" name="status" class="form-select">
                            <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>active</option>
                            <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>inactive</option>
                        </select>
                    </div>
                    <div class="text-end mt-4 mb-2">
                        <a href="{{ route('users.index') }}" class="btn btn-danger">Cencel</a>
                        <button type="submit" class="btn btn-warning">Edit User</button>
                    </div>
                </form>
                <!-- End Multi Columns Form -->

            </div>
        </div>
    </main>
@endsection
