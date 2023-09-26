<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ListBookController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $books = Book::with('categories')->latest()->get();
        return view('dashboard.list-books.index',[
            'listBooks' => $books
        ]);
    }
}
