<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookRentLogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function() {
// dashboard
Route::get('/dashboard', DashboardController::class)->name('dashboard');

// rent log
Route::get('/rent-logs', [RentLogController::class, 'index'])->name('rent-logs.index');
Route::get('/rent-logs/{rentLog}', [RentLogController::class, 'show'])->name('rent-logs.show');
Route::delete('/rent-logs/{rentLog}', [RentLogController::class, 'destroy'])->name('rent-logs.destroy');

// actual return date
Route::get('/actual-return-date', [RentLogController::class, 'create'])->name('actual-return-date.create');
Route::post('/actual-return-date', [RentLogController::class, 'store'])->name('actual-return-date.store');

// book rent
Route::get('/book-rent', [BookRentLogController::class, 'create'])->name('book-rent.create');
Route::post('/book-rent', [BookRentLogController::class, 'store'])->name('book-rent.store');
// books
Route::resource('books', BookController::class);
// categories
Route::resource('categories', CategoryController::class);
// operator
Route::resource('operator', OperatorController::class);
// users
Route::resource('users', UserController::class);

// profile
Route::get('/profile', [ProfileUserController::class, 'create'])->name('profile');
Route::put('/profile', [ProfileUserController::class, 'update'])->name('profile.update');

// change password
Route::put('/profile/password', [ProfileUserController::class, 'updatePassword'])->name('profile.password.update');

});


// authentification
Route::middleware('guest')->group(function() {
    // login
    Route::get('/login', [AuthController::class, 'formLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // register
    Route::get('/register', [AuthController::class, 'formRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// logout
Route::post('/logout', function() {
    auth()->logout();
    session()->flush();
    return redirect()->route('login')->with('success', 'Logout success');
})->middleware('auth')->name('logout');
