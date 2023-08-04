@extends('layouts.app')
@section('content')
    <main id="main" class="main">

        <!-- ======= Page Title ======= -->
        <div class="pagetitle">
            <h1>Create Book</h1>
            <nav>
                <ol class="breadcrumb">
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
                <form action="{{ route('books.store') }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" placeholder="your title book">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Author</label>
                        <div class="col-sm-10">
                            <input type="text" name="author" class="form-control"
                                placeholder="name of the author who wrote the book">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Publication Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="publication_date" class="form-control" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Cover</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="image" type="file" id="formFile">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description" style="height: 100px" placeholder="description of the book"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <a href="{{ route('books.index') }}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create Book</button>
                        </div>
                    </div>

                </form>
                <!-- End General Form Elements -->

            </div>
        </div>
    </main>
@endsection
