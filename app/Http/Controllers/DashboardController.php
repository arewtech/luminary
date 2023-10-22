<?php

namespace App\Http\Controllers;

use App\Charts\RentLogsChart;
use App\Charts\StatusBooksChart;
use App\Models\Book;
use App\Models\RentLog;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, StatusBooksChart $statusBooksChart, RentLogsChart $rentLogsChart)
    {
        $weekly = now()->subWeek();
        $data['books'] = Book::count();
        $data['users'] = User::whereRole('user')->whereStatus('active')->count();
        $data['totalFines'] = RentLog::where('status', 'late')->sum('fine');
        $data['totalSubWeekFines'] = RentLog::where('status', 'late')->where('created_at', '>=', $weekly)->sum('fine');
        $data['recentActivities'] = RentLog::with(['book', 'user'])
        ->where('created_at', '>=', today())
            ->latest()->limit(8)->get();
        // dd($data['totalSubWeekFines']);
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

        // data set users
        $user = auth()->user()->rentLogs;
        $data['rentLogUser'] = $user->count();
        $data['userNotReturned'] = $user->where('status', 'not returned')->count();
        $data['userFines'] = $user->where('status', 'late')->sum('fine');

        return view('dashboard.index', $data);
    }
}
