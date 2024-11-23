<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MembersModel extends Model
{
    use HasFactory;

    protected $table = 'members';

    protected $fillable = [
        'name',
        'national_id_number',
        'phone_number',
        'address',
        'join_date'
    ];

    public function books()
    {
        return $this->hasMany(BooksModel::class, 'member_id'); // 'member_id' adalah foreign key di tabel books
    }
}
