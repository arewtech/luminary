<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.books.index', [
            'books' => Book::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255|unique:books,title',
            'author' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'publication_date' => 'required|date',
        ]);
        $data['slug'] = str($request->title . ' ' . str()->random(5))->slug();
        $data['book_code'] = str("#LMR-" . str()->random(5))->upper();
        // return $data;
        Book::create($data);
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('dashboard.books.edit', [
            'book' => $book,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255|unique:books,title,' . $book->id,
            'author' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'publication_date' => 'required|date',
        ]);
        if ($request->title != $book->title) {
            $data['slug'] = str($request->title . ' ' . str()->random(5))->slug();
            $data['book_code'] = str("#LMR-" . str()->random(5))->upper();
        } else {
            $data['slug'] = $book->slug;
            $data['book_code'] = $book->book_code;
        }
        // return $data;
        $book->update($data);
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
