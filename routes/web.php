<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
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
