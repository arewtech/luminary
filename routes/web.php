<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookRentLogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function() {
// dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

// rent log
Route::get('/rent-logs', [RentLogController::class, 'index'])->name('rent-logs.index');

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
// users
Route::resource('users', UserController::class);

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
    return redirect()->route('login');
})->name('logout');
