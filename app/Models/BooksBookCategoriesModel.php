<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BooksBookCategoriesModel extends Pivot
{
    protected $table = 'books_book_categories';

    protected $fillable = [
        'book_id',
        'book_category_id',
    ];
}
