<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\RentLog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data['books'] = Book::count();
        $data['totalFines'] = RentLog::where('status', 'late')->sum('fine');
        $data['recentActivities'] = RentLog::with(['book', 'user'])
            ->latest()->limit(8)->get();
        // return $data;
        return view('dashboard.index', $data);
    }
}
