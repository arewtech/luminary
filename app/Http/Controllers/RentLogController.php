<?php

namespace App\Http\Controllers;

use App\Models\RentLog;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $rentLogs = RentLog::with(['book', 'user'])->latest()->get();
        // return $rentLogs;
        return view('dashboard.rent-logs.index', [
            'rentLogs' => RentLog::with(['book', 'user'])->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = $request->validate([
        //     'book_id' => 'required|exists:books,id',
        //     'user_id' => 'required|exists:users,id',
        //     'rent_date' => 'required|date',
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(RentLog $rentLog)
    {
        //
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
        //
    }
}
