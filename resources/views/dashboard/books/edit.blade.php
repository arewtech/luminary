@extends('layouts.app', ['title' => 'Edit Book - ' . $book->title])
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
            <h1 class="text-capitalize">Edit Book | {{ $book->title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Form</li>
                    <li class="breadcrumb-item"><a href="{{ route('books.index') }}">Books</a></li>
                    <li class="breadcrumb-item active">Edit Book</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Form Book</h5>

                <!-- General Form Elements -->
                <form action="{{ route('books.update', $book) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" value="{{ old('title', $book->title) }}"
                                class="form-control @error('title') is-invalid @enderror" placeholder="your title book">
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
                            <input type="text" name="author" value="{{ old('author', $book->author) }}"
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
                                value="{{ old('publication_date', $book->publication_date) }}">
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
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}"
                                        {{ in_array($item->id, $book->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Cover</label>
                        <div class="col-sm-10 d-flex gap-3 align-items-start">
                            <div class="position-relative">
                                <img id="uploadedCover"
                                    style="width: 150px; height: 150px object-fit: cover; object-position: center;"
                                    src="{{ $book->cover !== null ? asset('storage/' . $book->cover) : 'https://ui-avatars.com/api/?name=' . $book->title . '&color=7F9CF5&background=EBF4FF' }}"
                                    class="card-img-top" alt="{{ $book->title }}">
                                <span style=" top: -10px; right: -10px; line-height: 1.2; cursor: pointer;"
                                    class="book-cover-reset position-absolute rounded-4 badge bg-danger badge-number">x</span>
                            </div>
                            <input class="book-cover-input form-control" name="cover" type="file" id="formFile">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description" style="height: 100px" placeholder="description of the book">
                                {{ old('description', $book->description) }}
                            </textarea>
                        </div>
                    </div>
                    @if ($book->status != 'unavailable')
                        <div class="row mb-4">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10 d-flex align-items-center gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" name="status" type="radio" id="available"
                                        {{ $book->status == 'available' ? 'checked' : '' }} value="available">
                                    <label class="form-check-label" for="available">
                                        Available
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="status" type="radio" id="lost"
                                        {{ $book->status == 'lost' ? 'checked' : '' }} value="lost">
                                    <label class="form-check-label" for="lost">
                                        Lost
                                    </label>
                                </div>
                            </div>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    @endif
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <a href="{{ route('books.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
                            <button type="submit" class="btn btn-warning btn-sm">Edit Book</button>
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
@pushOnce('image-preview')
    <script>
        $('input#accountActivation').on('change', function() {
            $('button.deactivate-account').attr('disabled', !$(this).is(':checked'));
        });
        document.addEventListener('DOMContentLoaded', function(e) {
            (function() {
                // Update/reset user image of account page
                let coverBook = document.getElementById('uploadedCover');
                const fileInput = document.querySelector('.book-cover-input'),
                    resetFileInput = document.querySelector('.book-cover-reset');
                if (coverBook) {
                    const resetImage = coverBook.src;
                    fileInput.onchange = () => {
                        if (fileInput.files[0]) {
                            coverBook.src = window.URL.createObjectURL(fileInput.files[0]);
                        }
                    };
                    resetFileInput.onclick = () => {
                        fileInput.value = '';
                        coverBook.src = resetImage;
                    };
                }
            })
            ();
        });
    </script>
@endpushOnce
