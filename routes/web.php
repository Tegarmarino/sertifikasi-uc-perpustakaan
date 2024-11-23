<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookCategoriesController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('book_categories', BookCategoriesController::class);

// Rute resource untuk Books
Route::resource('books', BooksController::class);

// Rute resource untuk Members
Route::resource('members', MembersController::class);
