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
        return view('dashboard.book-rent.create', [
            'users' => User::whereRole('user')
                ->where('status', 'active')
                ->latest()->get(),
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
        $user = User::find($request->user_id);
        if ($rentBook->count() >= 3) {
            sweetalert()->addWarning($user->name . ' already rented 3 books, please return first.');
            return back();
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
        sweetalert()->addSuccess('Book rented successfully.');
        return back();
    } catch (\Throwable $th) {
        DB::rollBack();
            sweetalert()->addError('Something went wrong, please try again.');
            return back();
        }
    }
}
