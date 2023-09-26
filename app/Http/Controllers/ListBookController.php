<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class ListBookController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $books = Book::with('categories');
        $categories = Category::pluck('name', 'id')->sortBy('name');

        if ($request->filled('category')) {
            $books->whereHas('categories', function ($query) use ($request) {
                $query->where('name', $request->category);
            });
        }

        if ($request->filled('q')) {
            $books->where('title', 'like', '%'.$request->q.'%');
        }

        return view('dashboard.list-books.index',[
            'listBooks' => $books->latest()->get(),
            'categories' => $categories
        ]);
    }
}
