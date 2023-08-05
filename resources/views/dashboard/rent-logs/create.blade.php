@extends('layouts.app')
@section('content')
    <main id="main" class="main">

        <!-- ======= Page Title ======= -->
        <div class="pagetitle d-flex flex-column justify-content-center align-items-center">
            <h1>Book Rent</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Main</li>
                    <li class="breadcrumb-item active">Book Rent</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <div class="card mb-3 col-5 m-auto">

            <div class="card-body">

                <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                </div>
                @foreach ($errors->all() as $item)
                    {{ $item }}
                @endforeach
                <form action="{{ route('book-rent.store') }}" method="post" class="row g-3 needs-validation">
                    @csrf
                    <div class="col-12">
                        <label for="selectUsers" class="form-label">Name / Username</label>
                        <select id="selectUsers" name="user_id" class="form-select">
                            <option selected="" disabled>select users</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="selectBooks" class="form-label">Book Rent</label>
                        <select id="selectBooks" name="book_id" class="form-select">
                            <option selected="" disabled>select books</option>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">Rent Book</button>
                    </div>
                    <div class="col-12">
                        <p class="small mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus odit earum
                            quae.</a>
                        </p>
                    </div>
                </form>

            </div>
        </div>
    </main>
@endsection
