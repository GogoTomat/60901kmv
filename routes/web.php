<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use \App\Http\Controllers\LoginController;
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
Route::get('/hello', function () {
   return view('hello', ['title' => 'hello world!']);
});

///////////////////////////////////////////////////////////////////////////////

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/auth', [LoginController::class, 'authenticate'])->name('auth');

///////////////////////////////////////////////////////////////////////////////

Route::get('/books', [BookController::class, 'index']);
Route::get('/book/create', [BookController::class, 'create'])->middleware('auth');
Route::get('/book/edit/{id}', [BookController::class, 'edit'])->middleware('auth');
Route::get('/book/{id}', [BookController::class, 'index'])->middleware('auth');
Route::get('/book/destroy/{id}', [BookController::class, 'destroy'])->middleware('auth');

Route::post('/book/update/{id}', [BookController::class, 'update'])->middleware('auth');
Route::post('/book', [BookController::class, 'store']);

//////////////////////////////////////////////////////////////////////////////

Route::get('/user/{id}', [UserController::class, 'show']);

///////////////////////////////////////////////////////////////////////////////

Route::get('/genres', [GenreController::class, 'index']);
Route::get('/genre/{id}', [GenreController::class, 'show']);

///////////////////////////////////////////////////////////////////////////////

Route::get('/', function () {
    return view('welcome');
});
