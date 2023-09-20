<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $books = Book::with('categories')->latest()->get();
        // return $books;
        return view('dashboard.books.index', [
            'books' => Book::with('categories')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.books.create', [
            'categories' => Category::all(),
        ]);
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
            // 'categories' => 'required|array',
            'cover' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        $data['slug'] = str($request->title . ' ' . str()->random(5))->slug();
        $data['book_code'] = "B" . rand(1000, 9999);
        $data['cover'] = $request->file('cover')->store('images/covers', 'public');
        // dd($data);
        $book = Book::create($data);
        $book->categories()->attach($request->categories);
        // dd($data);
        return redirect()->route('books.index')->with('success', 'Book added successfully!');
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
        // $book = $book->load('categories');
        // return $book;
        return view('dashboard.books.edit', [
            'book' => $book,
            'categories' => Category::all(),
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
            'status' => 'nullable|in:available,unavailable,lost',
            // 'categories' => 'required|exists:categories,id',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('cover')) {
            Storage::delete('public/' . $book->cover);
            $data['cover'] = $request->file('cover')->store('images/covers', 'public');
        } else {
            $data['cover'] = $book->cover;
        }

        if ($request->title != $book->title) {
            $data['slug'] = str($request->title . ' ' . str()->random(5))->slug();
            $data['book_code'] = "B" . rand(1000, 9999);
        } else {
            $data['slug'] = $book->slug;
            $data['book_code'] = $book->book_code;
        }
        // return $data;
        $book->update($data);
        $book->categories()->sync($request->categories, true);
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if ($book->status == 'unavailable') {
            return back()->with('error', 'Book is currently rented!, please return the book first.');
        }
        Storage::delete('public/' . $book->cover);
        $book->categories()->detach();
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}
