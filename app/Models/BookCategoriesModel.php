<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookCategoriesModel extends Model
{
    use HasFactory;

    protected $table = 'book_categories';

    protected $fillable = [
        'name',
    ];

    /**
     * Relasi ke Books (Many-to-Many)
     */
    public function books()
    {
        return $this->belongsToMany(
            BooksModel::class,
            'books_book_categories',
            'book_category_id', // Foreign key pada tabel pivot untuk BookCategoriesModel
            'book_id' // Foreign key pada tabel pivot untuk BooksModel
        );
    }
}
