<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/books/feature', [BookController::class, 'feature'])
    ->name('books.feature');

// C1: kept so old bookmarks to /books/filter/{genre} don't 404.
// It no longer has its own view — it only redirects into books.index.
Route::get('/books/filter/{genre?}', [BookController::class, 'redirectOldFilter'])
    ->name('books.filter');

Route::resource('books', BookController::class)
    ->only(['index', 'show']);

Route::get('/teachers/featured', [TeacherController::class, 'featured'])
     ->name('teachers.featured');

Route::resource('teachers', TeacherController::class)
     ->only(['index', 'show']);
