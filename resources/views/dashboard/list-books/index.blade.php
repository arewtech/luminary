@extends('layouts.app')
@section('content')
    <main id="main" class="main">

        <!-- ======= Page Title ======= -->
        <div class="pagetitle d-flex justify-content-between align-items-center">
            <div>
                <h1>List Books</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Main</li>
                        <li class="breadcrumb-item active">List Books</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Page Title -->

        <!-- list books -->
        <div class="d-flex flex-wrap justify-content-center gap-4">
            @foreach ($listBooks as $item)
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
                            <span class="font-weight-bold">{{ $item->author }}</span></span>
                        <hr class="mt-2">
                        <p class="card-text mt-2 form-text line-clamp">{{ $item->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
