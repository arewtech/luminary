@extends('layouts.app', ['title' => 'Create Book'])
@pushOnce('select2:css')
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endPushOnce
@section('content')
    <main id="main" class="main">

        <!-- ======= Page Title ======= -->
        <div class="pagetitle">
            <h1>Create Book</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Form</li>
                    <li class="breadcrumb-item"><a href="{{ route('books.index') }}">Books</a></li>
                    <li class="breadcrumb-item active">Create Book</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create Form Book</h5>
                <!-- General Form Elements -->
                <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title') }}" placeholder="your title book">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Author</label>
                        <div class="col-sm-10">
                            <input type="text" name="author" value="{{ old('author') }}"
                                class="form-control @error('author') is-invalid @enderror"
                                placeholder="name of the author who wrote the book">
                            @error('author')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Publication Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="publication_date"
                                class="form-control @error('publication_date') is-invalid @enderror"
                                value="{{ date('Y-m-d') }}">
                            @error('publication_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputState" class="col-sm-2 col-form-label">Categories</label>
                        <div class="col-sm-10">
                            <select id="inputState" class="form-select js-multiple" multiple name="categories[]">
                                <option disabled>Choose...</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Cover</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="cover" type="file" id="formFile">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" style="height: 100px"
                                placeholder="description of the book">
                                {{ old('description') }}
                            </textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <a href="{{ route('books.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
                            <button type="submit" class="btn btn-primary btn-sm">Create Book</button>
                        </div>
                    </div>

                </form>
                <!-- End General Form Elements -->

            </div>
        </div>
    </main>
@endsection
@pushOnce('select2:js')
    <script>
        $(document).ready(function() {
            $('.js-multiple').select2();
        });
    </script>
@endPushOnce
