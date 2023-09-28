<?php

namespace App\Providers;

use App\Models\RentLog;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(Request $request): void
    {
        // $rentLogUser = RentLog::with('book')->findOrFail($request->rentLog);
    }
}
