<?php

namespace App\Http\Controllers;

use App\Charts\RentLogsChart;
use App\Charts\StatusBooksChart;
use App\Models\Book;
use App\Models\RentLog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, StatusBooksChart $statusBooksChart, RentLogsChart $rentLogsChart)
    {
        $data['books'] = Book::count();
        $data['totalFines'] = RentLog::where('status', 'late')->sum('fine');
        $data['recentActivities'] = RentLog::with(['book', 'user'])
            ->latest()->limit(8)->get();

        // status books chart
        $data['statusBooksChart'] = $statusBooksChart->build([
            Book::where('status', 'available')->count(),
            Book::where('status', 'unavailable')->count(),
            Book::where('status', 'lost')->count(),
        ]);

        // rent logs chart
        $data['rentLogsChart'] = $rentLogsChart->build([
            RentLog::where('status', 'returned')->count(),
            RentLog::where('status', 'not returned')->count(),
            RentLog::where('status', 'late')->count(),
        ]);
        // dd($data['statusBooksChart']);
        return view('dashboard.index', $data);
    }
}
