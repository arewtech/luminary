@extends('layouts.app')
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
                <h5 class="card-title">List Table Books : 1</h5>
                <p>
                    Book is a medium for recording information in the form of writing or images, usually composed of many
                    pages.
                </p>
                <!-- Bordered Table -->
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center" scope="col">No</th>
                                <th scope="col">Code Book</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Status</th>
                                <th scope="col" style="width: 200px">Desc</th>
                                <th scope="col">Cover</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-center" scope="row">1</th>
                                <td>#QWERTY666</td>
                                <td>The Lord Of The Ring</td>
                                <td>Joko Aragon</td>
                                <td><span class="badge bg-success">available</span></td>
                                <td class="line-clamp">
                                    he Lord of the Rings is a series of three epic fantasy adventure films directed by Peter
                                    Jackson, based on the novel The Lord of the Rings by J. R. R. Tolkien. The films are
                                    subtitled The Fellowship of the Ring </td>
                                <td>-</td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square text-white"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#bookDelete">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <!-- Button trigger modal -->
                                    <div class="modal fade" id="bookDelete" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete Book</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this book?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Button trigger modal -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- End Bordered Table -->
            </div>
        </div>
    </main>
@endsection
