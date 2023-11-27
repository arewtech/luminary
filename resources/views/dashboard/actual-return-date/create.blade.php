@extends('layouts.app', ['title' => 'Actual Return Date'])
@pushOnce('select2:css')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endPushOnce
@section('content')
    <main id="main" class="main">

        <!-- ======= Page Title ======= -->
        <div class="pagetitle">
            <h1>Actual Return Date</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Main</li>
                    <li class="breadcrumb-item active">Actual Return Date</li>
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
                                <h5 class="card-title text-center pb-0 fs-4">
                                    <i class="bi bi-box-arrow-in-right"></i> Actual Return Date
                                </h5>
                                <p class="text-center small">
                                    Please fill in the form below to return the book.
                                </p>
                            </div>
                            <form action="{{ route('actual-return-date.store') }}" method="post"
                                class="row g-3 needs-validation">
                                @csrf
                                <div class="col-12">
                                    <label for="selectUsers" class="form-label">Name / Username</label>
                                    <select id="selectUsers" name="user_id"
                                        class="form-select select2 @error('user_id') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option selected="" disabled>select users</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ ucfirst($user->name) }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="selectBooks" class="form-label">Book Rent</label>
                                    <select id="selectBooks" name="book_id"
                                        class="form-select select2 @error('book_id') is-invalid @enderror">
                                        <option selected="" disabled>select books</option>
                                        @foreach ($books as $book)
                                            <option value="{{ $book->id }}">{{ ucfirst($book->title) }}</option>
                                        @endforeach
                                    </select>
                                    @error('book_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputDate" class="form-label">Actual Return Date</label>
                                    <input type="date" name="actual_return_date"
                                        class="form-control @error('actual_return_date') is-invalid @enderror"
                                        value="{{ date('Y-m-d') }}">
                                    @error('actual_return_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Returned</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">
                                        <span class="text-danger">*</span> <span class="fw-bold">Note:</span>
                                        Please make sure the book is returned on time.
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
@pushOnce('select2:js')
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                theme: 'bootstrap-5',
            });
        });
    </script>
@endPushOnce
