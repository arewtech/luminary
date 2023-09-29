@extends('layouts.app', ['title' => 'Book List'])
@pushOnce('select2:css')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endPushOnce
@section('content')
    <main id="main" class="main">

        <!-- ======= Page Title ======= -->
        <div class="pagetitle d-flex justify-content-between align-items-center">
            <div>
                <h1>Book List</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Main</li>
                        <li class="breadcrumb-item active">Book List</li>
                    </ol>
                </nav>
            </div>
            <div class="col-7 col-xxl-5">
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Filter</label>
                        <select class="form-select select2" name="category" id="inputGroupSelect01">
                            <option selected="" disabled="">Choose...</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item }}"
                                    {{ request()->get('category') == $item ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                        <input style="width: 130px" type="search" class="form-control" name="q"
                            value="{{ request()->q }}" placeholder="Search..."
                            aria-label="Text input with dropdown button">
                        <button class="btn btn-outline-primary" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- list books -->
        <div class="d-flex flex-wrap justify-content-center gap-4">
            @forelse ($listBooks as $item)
                <div style="width: 16.5rem" class="card m-0">
                    <div class="position-relative">
                        <img style="object-fit: cover; object-position: center;"
                            src="{{ $item->cover !== null ? asset('storage/' . $item->cover) : 'https://ui-avatars.com/api/?name=' . $item->title . '&color=7F9CF5&background=EBF4FF' }}"
                            class="card-img-top" with="100%" height="200px" alt="{{ $item->title }}">
                        <span style="top: 6px; right: 6px; font-size: 0.75rem;"
                            class="badge {{ $item->setStatusBooks() }} position-absolute rounded-4"
                            title="Remove my profile image">
                            {{ $item->status }}
                        </span>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title pb-0 mb-0 pt-3">{{ $item->title }}</h3>
                        <div class="d-flex align-items-center gap-1 mt-2 flex-wrap">
                            @foreach ($item->categories as $category)
                                <span class="badge text-lowercase bg-secondary rounded-2">{{ $category->name }}</span>
                            @endforeach
                        </div>
                        <span class="font-weight-normal text-secondary form-text">Author :
                            <span class="font-weight-bold text-capitalize">{{ $item->author }}</span></span>
                        <hr class="mt-2">
                        <p class="card-text mt-2 form-text line-clamp">{{ $item->description }}</p>
                    </div>
                </div>
            @empty
                <p style="transform: translateY(160px)" class="text-center">No books found. 😭🥲</p>
            @endforelse
        </div>
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
