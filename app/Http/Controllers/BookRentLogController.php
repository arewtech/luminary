<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\RentLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookRentLogController extends Controller
{
    public function create()
    {
        return view('dashboard.rent-logs.create', [
            'users' => User::where('role', 'user')->latest()->get(),
            'books' => Book::whereStatus('available')->latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'book_id' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
        ]);
        $data['rent_date'] = now();
        $data['return_date'] = now()->addDays(3);

        try {
            DB::beginTransaction();
            $rentBook = RentLog::where('user_id', $request->user_id)
            ->whereNull('actual_return_date')->get();

        // check user rent book count
        if ($rentBook->count() >= 3) {
            return back()->with('error', 'You have already rented 3 books, please return the books to rent more.');
        }

        // check book status
        $book = Book::find($request->book_id);
        if($book->status != 'available') {
            return back()->with('error', 'This book is not available to rent.');
        } else {
            $book->update(['status' => 'unavailable']);
        }

        // return $data;
        RentLog::create($data);
        DB::commit();
        return back()->with('success', 'Book rented successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong, please try again.');
        }
    }
}
