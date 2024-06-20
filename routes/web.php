<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::post('/books/{id}/toggle-favorite', [BookController::class, 'toggleFavorite'])->name('books.toggle-favorite');
Route::delete('/books/{id}/delete', [BookController::class, 'destroy'])->name('books.destroy'); // Rota para exclusão de livro
Route::get('/favorites', [BookController::class, 'favorites'])->name('books.favorites');
