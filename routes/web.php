<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\LoanController;

// Route untuk halaman utama
Route::get('/', [BooksController::class, 'index']);

// Route untuk kategori
Route::resource('categories', CategoryController::class);

// Route untuk buku
Route::resource('books', BooksController::class);

// Route untuk pinjaman
Route::resource('loans', LoanController::class);

// Route untuk menampilkan form pinjaman baru
Route::get('/loans/create', [LoanController::class, 'create'])->name('loans.create');
Route::post('/loans', [LoanController::class, 'store'])->name('loans.store');

// Route untuk menampilkan daftar pinjaman
Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');

// Route untuk menampilkan form pengembalian buku
Route::get('/loans/{loan}/return', [LoanController::class, 'returnBookForm'])->name('loans.return');

// Route untuk mengupdate status pengembalian buku
Route::post('/loans/{loan}/return', [LoanController::class, 'returnBook'])->name('loans.return.submit');

// Route untuk menampilkan detail pinjaman
Route::get('/loans/{loan}', [LoanController::class, 'show'])->name('loans.show');


