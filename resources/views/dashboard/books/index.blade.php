@extends('layouts.app', ['title' => 'Books'])
@section('content')
    <main id="main" class="main">

        <!-- ======= Page Title ======= -->
        <div class="pagetitle d-flex justify-content-between align-items-center">
            <div>
                <h1>Data Books</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Form</li>
                        <li class="breadcrumb-item active">Books</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm">Create Book</a>
        </div>
        <!-- End Page Title -->

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">List Table Books : {{ count($books) }}</h5>
                <p>
                    Book is a medium for recording information in the form of writing or images, usually composed of many
                    pages.
                </p>
                <!-- Bordered Table -->
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" scope="col">No</th>
                                <th scope="col">Code</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col" style="width: 200px">Categories</th>
                                <th scope="col">Status</th>
                                {{-- <th scope="col" style="width: 200px">Desc</th> --}}
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($books as $item)
                                <tr>
                                    <th class="text-center" scope="row">
                                        {{ $loop->iteration + $books->perPage() * ($books->currentPage() - 1) }}
                                    </th>
                                    <td class="fw-bold">{{ $item->book_code }}</td>
                                    <td><a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#bookDetail{{ $item->slug }}"
                                            class="text-capitalize">{{ $item->title }}</a></td>
                                    <td class="text-capitalize">{{ $item->author }}</td>
                                    <td>
                                        @forelse ($item->categories as $category)
                                            <span class="badge text-lowercase bg-secondary">{{ $category->name }}</span>
                                        @empty
                                            <span class="badge bg-danger">No Categories</span>
                                        @endforelse
                                    </td>
                                    <td>
                                        <span class="badge {{ $item->setStatusBooks() }}">{{ $item->status }}</span>
                                    </td>
                                    <td>
                                        <div class="d-inline-flex gap-1">
                                            <a href="
                                                javascript:void(0)"
                                                class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#bookDetail{{ $item->slug }}">
                                                <i class="bi bi-eye text-white"></i>
                                            </a>
                                            @include('includes.modal.detail-book', ['item' => $item])
                                            <a href="{{ route('books.edit', $item) }}" class="btn btn-warning btn-sm">
                                                <i class="bi bi-pencil-square text-white"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#bookDelete{{ $item->slug }}">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                        <!-- Button trigger modal -->
                                        <div class="modal fade" id="bookDelete{{ $item->slug }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-capitalize">
                                                            Delete Book {{ $item->title }}
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this book?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <form action="{{ route('books.destroy', $item) }}" method="post">
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
                                    <td colspan="8" class="text-center">Data not found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- End Bordered Table -->
                <div class='px-4 mt-2'>{{ $books->links() }}</div>
            </div>
        </div>
    </main>
@endsection
