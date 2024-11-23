<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MembersModel;

class HomeController extends Controller
{
    /**
     * Display the home page with borrowing data.
     */
    public function index()
    {
        // Mengambil semua anggota yang sedang meminjam setidaknya satu buku, beserta buku yang dipinjam
        $members = MembersModel::with(['books.categories'])
            ->whereHas('books') // Hanya anggota yang memiliki buku yang dipinjam
            ->get();

        return view('home', compact('members'));
    }
}
