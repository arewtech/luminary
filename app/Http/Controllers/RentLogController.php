<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\RentLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('dashboard.rent-logs.index', [
            'rentLogs' => RentLog::search($request->q)
                ->latest()
                ->paginate(setting('app_paginate') ?? 10),
            'totalFines' => RentLog::where('status', 'late')->sum('fine'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.actual-return-date.create', [
            'users' => User::whereRole('user')
                ->where('status', 'active')
                ->latest()->get(),
            'books' => Book::whereStatus('unavailable')->latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'book_id' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
            'actual_return_date' => 'required|date|after_or_equal:today',
        ]);

        // check if the book is already rented by the user
        $returned = RentLog::where('book_id', $request->book_id)
            ->where('user_id', $request->user_id)
            ->whereNull('actual_return_date')
            ->first();

        // if the book is rented by the user
        if ($returned) {
            $startDate = Carbon::parse($returned->return_date);
            $endDate = Carbon::parse($data['actual_return_date']);

            // calculate fine
            if ($endDate > $startDate) {
                // calculate difference in days
                $diffInDays = $endDate->diffInDays($startDate);
                $fine = 1000 * $diffInDays;
            } else {
                $fine = 0;
            }

            // update the rent log
            $returned->update([
                'actual_return_date' => $data['actual_return_date'] . " " . now()->format('H:i:s'),
                'status' => $endDate > $startDate ? 'late' : 'returned',
                'fine' => $fine,
            ]);

            // update the book status
            $book = Book::find($request->book_id);
            $book->update([
                'status' => 'available',
            ]);
            sweetalert()->addSuccess('Book returned successfully.');
            return back();
        } else {
            $user = User::find($request->user_id);
            sweetalert()->addError($user->name . ' did not rent this book.');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(RentLog $rentLog)
    {
        // return  $rentLog->load(['book.categories', 'user']);
        return view('dashboard.rent-logs.show', [
           'rentLog' => $rentLog->load(['book.categories', 'user']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RentLog $rentLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RentLog $rentLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RentLog $rentLog)
    {
        if ($rentLog->status == 'not returned') {
            return back()->with('error', 'Book is not returned yet!, please return the book first.');
        }
        $rentLog->delete();
        return back()->with('success', 'Rent log deleted successfully!');
    }
}
