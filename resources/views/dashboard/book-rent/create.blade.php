@extends('layouts.app')
@section('content')
    <main id="main" class="main">

        <!-- ======= Page Title ======= -->
        <div class="pagetitle">
            <h1>Book Rent</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Main</li>
                    <li class="breadcrumb-item active">Book Rent</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <section class="section faq">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Create Book Rent 📖</h5>
                                <p class="text-center small">
                                    Please fill in the form below to create a book rent.
                                </p>
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
                                    <p class="small mb-0">
                                        <span class="text-danger">*</span> <span class="fw-bold">Note:</span> Rent
                                        book
                                        will be automatically returned after 3 days.
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card basic">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="bi bi-question-circle"></i> Frequently Asked Questions
                            </h5>
                            <div>
                                <h6>1. Nisi ut ut exercitationem voluptatem esse sunt rerum?</h6>
                                <p>Saepe perspiciatis ea. Incidunt blanditiis enim mollitia qui voluptates. Id rem nulla
                                    tenetur
                                    nihil in unde rerum. Quae consequatur placeat qui cumque earum eius omnis quos.</p>
                            </div>
                            <div class="pt-2">
                                <h6>2. Reiciendis dolores repudiandae?</h6>
                                <p>Id ipsam non ut. Placeat doloremque deserunt quia tenetur inventore laboriosam dolores
                                    totam
                                    odio. Aperiam incidunt et. Totam ut quos sunt atque modi molestiae dolorem.</p>
                            </div>
                            <div class="pt-2">
                                <h6>3. Qui qui reprehenderit ut est illo numquam voluptatem?</h6>
                                <p>Enim inventore in consequuntur ipsam voluptatem consequatur beatae. Nostrum consequuntur
                                    voluptates et blanditiis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
