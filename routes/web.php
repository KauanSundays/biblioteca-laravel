<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::post('/books/{id}/toggle-favorite', [BookController::class, 'toggleFavorite'])->name('books.toggle-favorite');
Route::get('/api/books', [BookController::class, 'indexJson'])->name('books.indexJson');
Route::get('/favorites', [BookController::class, 'favorites'])->name('books.favorites');