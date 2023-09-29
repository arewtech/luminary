@extends('layouts.app', ['title' => 'Categories'])
@section('content')
    <main id="main" class="main">

        <!-- ======= Page Title ======= -->
        <div class="pagetitle d-flex justify-content-between align-items-center">
            <div>
                <h1>Data Categories</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">Create Category</a>
        </div>
        <!-- End Page Title -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">List Table Categories : {{ count($categories) }}</h5>
                <p>
                    Categories of books are divided into several categories, namely fiction, non-fiction, children's books,
                </p>
                <!-- Bordered Table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $item)
                                <tr>
                                    <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                    <td class="text-capitalize">{{ $item->name }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $item) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square text-white"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#categoryDelete{{ $item->slug }}">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <!-- Button trigger modal -->
                                        <div class="modal fade" id="categoryDelete{{ $item->slug }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-capitalize">Delete Category
                                                            {{ $item->name }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this category?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <form action="{{ route('categories.destroy', $item) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Button trigger modal -->
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Data not found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- End Bordered Table -->
            </div>
        </div>
    </main>
@endsection
