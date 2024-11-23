<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BooksModel extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'published_date',
        'number_of_pages',
        'member_id',
    ];

    /**
     * Relasi ke Member
     * Satu buku dimiliki oleh satu member.
     */
    public function member()
    {
        return $this->belongsTo(MembersModel::class, 'member_id'); // Pastikan nama relasi adalah 'member'
    }

    /**
     * Relasi ke Book Categories (Many-to-Many)
     */
    public function categories()
    {
        return $this->belongsToMany(
            BookCategoriesModel::class,
            'books_book_categories',
            'book_id', // Foreign key pada tabel pivot untuk BooksModel
            'book_category_id' // Foreign key pada tabel pivot untuk BookCategoriesModel
        );
    }
}
